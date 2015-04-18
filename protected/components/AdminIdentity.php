<?php

/**
 * AdminIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class AdminIdentity extends CUserIdentity {

    public $email;

    const ERROR_EMAIL_INVALID = 1;

    private $_id;

    public function __construct($username, $password, $email) {
        parent::__construct($username, $password);
        $this->email = $email;
    }

    /**
     * Authenticates a admin.
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {

        $user = Admin::model()->find('admin_email = :U', array(':U' => $this->email));


        if ($user === null):
            $this->errorCode = self::ERROR_EMAIL_INVALID;     // Error Code : 1
        else:
            $is_correct_password = ($user->admin_password !== Myclass::encrypt($this->password)) ? false : true;

            if ($is_correct_password):
                $this->errorCode = self::ERROR_NONE;
            else:
                $this->errorCode = self::ERROR_EMAIL_INVALID;   // Error Code : 1
            endif;
        endif;

        if ($this->errorCode == self::ERROR_NONE):
            $lastLogin = date('Y-m-d H:i:s');
            $user->admin_last_login = $lastLogin;
            $user->admin_login_ip = Yii::app()->request->userHostAddress;
            $user->save(false);
            $this->_id = $user->admin_id;
            $this->setState('name', $user->admin_name);
            $this->setState('role', 'admin');
        endif;

        return !$this->errorCode;
    }

    /**
     * @return integer the ID of the user record
     */
    public function getId() {
        return $this->_id;
    }

}
