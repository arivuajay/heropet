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
                'actions' => array('index', 'view', 'update', 'admin', 'delete'),
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
                    $user_profile->save();
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
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
