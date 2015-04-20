<?php

class HybridAuthIdentity extends CUserIdentity {

    const VERSION = '2.4.1';

    /**
     *
     * @var Hybrid_Auth
     */
    public $hybridAuth;

    /**
     *
     * @var Hybrid_Provider_Adapter
     */
    public $adapter;

    /**
     *
     * @var Hybrid_User_Profile
     */
    public $userProfile;
    public $allowedProviders = array('google', 'facebook', 'linkedin', 'yahoo', 'live',);
    protected $config;

    function __construct() {
        $path = Yii::getPathOfAlias('ext.HybridAuth');
        require_once $path . '/hybridauth-' . self::VERSION . '/hybridauth/Hybrid/Auth.php';  //path to the Auth php file within HybridAuth folder

        $this->config = array(
            // "base_url" the url that point to HybridAuth Endpoint (where the index.php and config.php are found)
            "base_url" => Yii::app()->createAbsoluteUrl("/site/user/socialLogin"),
            "providers" => array(
                "Google" => array(
                    "enabled" => true,
                    "keys" => array(
                        "id" => GOOGLE_APP_ID,
                        "secret" => GOOGLE_SEC_ID,
                    ),
                    "scope" => "https://www.googleapis.com/auth/userinfo.profile " . "https://www.googleapis.com/auth/userinfo.email",
                    "access_type" => "online",
                ),
                "Facebook" => array(
                    "enabled" => true,
                    "keys" => array(
                        "id" => FB_APP_ID,
                        "secret" => FB_SEC_ID,
                    ),
                    "scope" => "email"
                ),
                "Live" => array(
                    "enabled" => true,
                    "keys" => array(
                        "id" => "windows client id",
                        "secret" => "Windows Live secret",
                    ),
                    "scope" => "email"
                ),
                "Yahoo" => array(
                    "enabled" => true,
                    "keys" => array(
                        "key" => "yahoo client id",
                        "secret" => "yahoo secret",
                    ),
                ),
                "LinkedIn" => array(
                    "enabled" => true,
                    "keys" => array(
                        "key" => "linkedin client id",
                        "secret" => "linkedin secret",
                    ),
                ),
            ),
            "debug_mode" => false,
            // to enable logging, set 'debug_mode' to true, then provide here a path of a writable file
            "debug_file" => "",
        );

        $this->hybridAuth = new Hybrid_Auth($this->config);
    }

    /**
     *
     * @param string $provider
     * @return bool
     */
    public function validateProviderName($provider) {
        if (!is_string($provider))
            return false;
        if (!in_array($provider, $this->allowedProviders))
            return false;

        return true;
    }

    public function processLogin() {
        if (!empty($this->userProfile)) {
            $newrecord = false;
            $model = User::model()->find("user_email = '{$this->userProfile->email}'");

            if (is_null($model)):
                $newrecord = true;
                $model = new User('social_register');
            endif;

            $result = $this->registerNewUser($model, $newrecord);
            $identity = new UserIdentity('user_name', 'anonyms', $result->user_email);
            $identity->autoLogin();
            Yii::app()->user->login($identity);
        }
    }

    public function registerNewUser($model, $newrecord) {
        if ($newrecord):
            $model->user_email = $this->userProfile->email;
            $password = Myclass::getRandomString('8');
            $model->user_password = Myclass::encrypt($password);
            $model->user_status = 1;
            $model->user_last_login = date('Y-m-d h:i:s');
        else:
            $model->user_status = 1;
            $model->user_last_login = date('Y-m-d h:i:s');
        endif;

        if ($model->validate()) {
            $model->save(false);

            if ($newrecord && !empty($model->user_email)):
                $this->sendRegistrationMail($model, $password);
            endif;

            return $model;
        } else {
            echo CHtml::errorSummary($model);
            exit;
        }
    }

    public function sendRegistrationMail($model, $password) {
        $mail = new Sendmail();
        $nextstep_url = Yii::app()->createAbsoluteUrl('/site/user/login');
        $subject = "Registraion Mail From - " . SITENAME;
        $trans_array = array(
            "{NAME}" => $this->userProfile->firstName,
            "{USERNAME}" => $model->user_email,
            "{PASSWORD}" => $password,
            "{NEXTSTEPURL}" => $nextstep_url,
        );
        $message = $mail->getMessage('registration', $trans_array);

        $mail->send($model->user_email, $subject, $message);
    }

}
