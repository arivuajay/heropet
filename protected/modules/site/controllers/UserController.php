<?php

class UserController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
                //'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('register', 'login', 'socialLogin', 'socialLoginProvider', 'captcha'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('profile', 'logout'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
        );
    }

    //User Registration Form.
    public function actionRegister() {
        if (!Yii::app()->user->isGuest)
            $this->goUserHome();

        $model = new User('register');
        $user_profile = new UserProfile('register');

        // Comment the following line if AJAX validation is not needed
        $this->performAjaxValidation(array($model, $user_profile));

        if (isset($_POST['User'], $_POST['UserProfile'])) {
            $model->attributes = $_POST['User'];
            $user_profile->attributes = $_POST['UserProfile'];

            $user_profile->latitude = '1.123456';
            $user_profile->longitude = '-123.123456';

            $model->user_status = 1;

            // validate BOTH $model and $user_profile
            $valid = $model->validate();
            $valid = $user_profile->validate() && $valid;

            if ($valid) {
                $password = $model->user_password;
                $model->user_password = Myclass::encrypt($password);

                if ($model->save(false)) {
                    $user_profile->pet_user_id = $model->user_id;

                    $user_profile->save();

                    if (!empty($model->user_email)):
                        $mail = new Sendmail();
                        $nextstep_url = Yii::app()->createAbsoluteUrl('/site/user/login');
                        $subject = "Registraion Mail From - " . SITENAME;
                        $trans_array = array(
                            "{NAME}" => $user_profile->user_first_name,
                            "{USERNAME}" => $model->user_email,
                            "{PASSWORD}" => $password,
                            "{NEXTSTEPURL}" => $nextstep_url,
                        );
                        $message = $mail->getMessage('registration', $trans_array);

                        $mail->send($model->user_email, $subject, $message);
                    endif;

                    Yii::app()->user->setFlash('success', 'Registration Completed Successfully!!!, Your login details has been sent to your e-mail.');
                    $this->redirect(array('login'));
                }
            }
        }

        $this->render('register', array(
            'model' => $model,
            'user_profile' => $user_profile
        ));
    }

    public function actionLogin() {
        if (!Yii::app()->user->isGuest)
            $this->goUserHome();
        
        $model = new LoginForm();
        $this->performAjaxValidation($model);

        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            if ($model->validate() && $model->login()):
                $this->redirect(array('profile'));
            endif;
        }

        $this->render('login', array(
            'model' => $model
        ));
    }
    
    public function actionProfile(){
        $this->render('profile');
    }

    /**
     * User Logout section 
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        Yii::app()->session->open();
        Yii::app()->user->setFlash('success', 'Log Out Successfully!!!');
        $this->redirect(array('/site/user/login'));
    }

    
    public function actionSocialLoginProvider($provider) {
        try {
            Yii::import('application.components.HybridAuthIdentity');
            $haComp = new HybridAuthIdentity();
            if (!$haComp->validateProviderName($provider))
                throw new CHttpException('500', 'Invalid Action. Please try again.');

            $haComp->adapter = $haComp->hybridAuth->authenticate($provider);
            $haComp->userProfile = $haComp->adapter->getUserProfile();

            $haComp->processLogin();  //further action based on successful login or re-direct user to the required url
            $redirectUrl = $this->createUrl("/site/user/profile");
            echo "<script type='text/javascript'>if(window.opener){window.opener.location = '$redirectUrl';window.close();}else{window.opener.location = '$redirectUrl';}</script>";
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
            //process error message as required or as mentioned in the HybridAuth 'Simple Sign-in script' documentation
            $this->redirect('/site/index');
            return;
        }
    }

    public function actionSocialLogin() {
        Yii::import('application.components.HybridAuthIdentity');
        $path = Yii::getPathOfAlias('ext.HybridAuth');
        require_once $path . '/hybridauth-' . HybridAuthIdentity::VERSION . '/hybridauth/index.php';
    }
    
    

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return User the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = User::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param User $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        $forms = array('login-form', 'user-form');
        if (isset($_POST['ajax']) && in_array($_POST['ajax'], $forms)) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
