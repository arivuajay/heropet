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
            array('allow', // allow all users to perform 'register' actions
                'actions' => array('register', 'login'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('profile', 'logout'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array(''),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Register a new user.
     * If creation is successful, the browser will be redirected to the 'login' page.
     */
    public function actionRegister() {
        $model = new User('register');
        $user_profile = new UserProfile;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation(array($model, $user_profile));

        if (isset($_POST['User'], $_POST['UserProfile'])) {

            $model->attributes = $_POST['User'];
            $user_profile->attributes = $_POST['UserProfile'];

            $egmap = new EasyGoogleMap();
            $current_position = $egmap->getCurrentPosition($user_profile->user_address);

            $user_profile->latitude = $current_position['lat'];
            $user_profile->longitude = $current_position['lng'];

            // validate BOTH $model and $user_profile
            $valid = $model->validate();
            $valid = $user_profile->validate() && $valid;

            if ($valid) {

                $country_id = Country::model()->checkCountry($current_position['country'], $current_position['country_code']);
                $state_id = State::model()->checkState($country_id, $current_position['state'], $current_position['state_code']);
                $city_id = City::model()->checkCity($country_id, $state_id, $current_position['city']);

                $user_profile->pet_country_id = $country_id;
                $user_profile->pet_state_id = $state_id;
                $user_profile->pet_city_id = $city_id;

                $password = Myclass::getRandomString(9);
                $model->password_hash = Myclass::encrypt($password);
                $model->role = 2;

                if ($model->save()) {
                    $user_profile->pet_user_id = $model->id;

                    $uploadedFile = CUploadedFile::getInstance($user_profile, 'user_profile_picture');
                    if (!empty($uploadedFile)) {
                        $random_string = Myclass::getRandomString(5);
                        $fileName = "{$random_string}-{$uploadedFile}";
                        $user_profile->user_profile_picture = $fileName;
                    }

                    if ($user_profile->save()) {
                        if (!empty($uploadedFile)) {
                            $uploadedFile->saveAs(Yii::app()->basePath . '/../uploads/pet_user_profile/' . $fileName);
                        }
                    }

                    if (!empty($model->email)):
                        $mail = new Sendmail();
                        $nextstep_url = Yii::app()->createAbsoluteUrl('/site/user/login');
                        $subject = "Registraion Mail From - " . SITENAME;
                        $trans_array = array(
                            "{NAME}" => $user_profile->user_first_name,
                            "{USERNAME}" => $model->email,
                            "{PASSWORD}" => $password,
                            "{NEXTSTEPURL}" => $nextstep_url,
                        );
                        $message = $mail->getMessage('registration', $trans_array);
                        $mail->send($model->email, $subject, $message);
                    endif;

                    Yii::app()->user->setFlash('success', 'User Registered Successfully!!!');
                    $this->redirect(array('login'));
                }
            }
        }

        $this->render('register', array('model' => $model, 'user_profile' => $user_profile));
    }

    /**
     * User Login section 
     */
    public function actionLogin() {
        
        if (!Yii::app()->user->isGuest) {
            $this->redirect(array('profile'));
        }
        
        $model = new LoginForm();
        $this->performAjaxValidation($model);

        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            if ($model->validate() && $model->login()):
                $this->redirect(array('profile'));
            endif;
        }

        $this->render('login', array('model' => $model));
    }
    
    /**
     * User Profile section 
     */
//    public function actionProfile() {
//        $id = Yii::app()->user->id;
//        $model = User::model()->findByPk($id);
//        $model->setScenario('update');
//
//        if (isset($_POST['User'])) {
//            $model->attributes = $_POST['User'];
//            if ($model->validate()):
//                $model->save(false);
//                Yii::app()->user->setFlash('success', 'Profile updated successfully');
//                $this->refresh();
//            endif;
//        }
//        $this->render('profile', compact('model'));
//    }
    
    /**
     * User Logout section 
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        Yii::app()->session->open();
        Yii::app()->user->setFlash('success', 'Log Out Successfully!!!');
        $this->redirect(array('login'));
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
