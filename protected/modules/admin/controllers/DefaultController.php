<?php

class DefaultController extends Controller {
    
    /**
     * @array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'Login' and 'RequestPasswordReset' actions
                'actions' => array('login'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('logout', 'index'),
                'expression' => array('Controller','allowAdminRole')
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
    
    public function actionLogin(){
        $this->layout = '//layouts/login';
        
        if (!Yii::app()->user->isGuest) {
            $this->goAdminHome();
        }

        $model = new AdminLoginForm();

        if (isset($_POST['sign_in'])) {
            $model->attributes = $_POST['AdminLoginForm'];
            if ($model->validate() && $model->login()):
                $this->goAdminHome();
            endif;
        }

        $this->render('login', array('model' => $model));
    }
    
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(array('/admin/default/login'));
    }

    public function actionIndex() {
        $this->render('index');
    }

}
