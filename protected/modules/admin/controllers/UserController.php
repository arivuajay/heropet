<?php

class UserController extends Controller {

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('forgot', 'reset'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'create', 'update', 'search', 'sendemail', 'view', 'delete'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new User('create');
        $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->validate()):
                $password = Myclass::getRandomString(9);
                $model->password_hash = Myclass::encrypt($password);

                $model->save(false);
                if (!empty($model->email)):
                    $mail = new Sendmail();
                    $nextstep_url = Yii::app()->createAbsoluteUrl('/admin/default/login');
                    $subject = "Registraion Mail From - " . SITENAME;
                    $trans_array = array(
                        "{NAME}" => $model->name,
                        "{USERNAME}" => $model->username,
                        "{PASSWORD}" => $password,
                        "{NEXTSTEPURL}" => $nextstep_url,
                    );
                    $message = $mail->getMessage('registration', $trans_array);
                    $mail->send($model->email, $subject, $message);
                    Yii::app()->user->setFlash('success', 'User Created Successfully!!!');
                    $this->redirect(array('index'));
                endif;
            endif;
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $model->setScenario('update');

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->validate()) {
                $model->save(false);
                Yii::app()->user->setFlash('success', 'User Updated Successfully!!!');
                $this->redirect(array('index'));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $search = false;

        $model = new User();
        $searchModel = new User('search');
        $searchModel->unsetAttributes();  // clear any default values
        if (isset($_GET['User'])) {
            $search = true;
            $searchModel->attributes = $_GET['User'];
            $searchModel->search();
        }

        $this->render('index', compact('searchModel', 'search', 'model'));
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
        if (isset($_POST['ajax']) && ($_POST['ajax'] === 'user-form' || $_POST['ajax'] === 'profile-form')) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionForgot() {
        $this->layout = '//layouts/login';
        if (!Yii::app()->user->isGuest)
            $this->redirect(array('/admin/default/index'));

        $model = new LoginForm('forgotpass');
        $this->performAjaxValidation($model);
        if (isset($_POST['forgot'])) {
            $user = User::model()->findByAttributes(array('email' => $_POST['LoginForm']['email']));
            if (empty($user)) {
                Yii::app()->user->setFlash('danger', 'This Email Address Not Exists!!!');
                $this->refresh();
            }else{
                $reset_link = Myclass::getRandomString(25);
                $user->setAttribute('password_reset_token', $reset_link);
                $user->setAttribute('updated_at', strtotime(date('Y-m-d H:i:s')));
                $user->save(false);

                ///////////////////////
                $time_valid = date('Y-m-d H:i:s');
                $resetlink = Yii::app()->createAbsoluteUrl('/admin/user/reset?str=' . $user->password_reset_token . '&id=' . $user->id);
                if (!empty($user->email)):
                    //$loginlink = Yii::app()->createAbsoluteUrl('/admin/default/login');
                    $mail = new Sendmail;
                    $trans_array = array(
                        "{SITENAME}" => SITENAME,
                        "{USERNAME}" => $user->username,
                        "{EMAIL_ID}" => $user->email,
                        "{NEXTSTEPURL}" => $resetlink,
                        "{TIMEVALID}" => $time_valid,
                    );
                    $message = $mail->getMessage('forgot_password', $trans_array);
                    $Subject = $mail->translate('{SITENAME}: Reset Password');
                    $mail->send($user->email, $Subject, $message);
                endif;

                Yii::app()->user->setFlash('success', "Your Password Reset Link sent to your email address.");
                $this->redirect(array('/admin/default/login'));
            }
        }

        $this->render('forgot', array('model' => $model));
    }
    
    public function actionReset($str, $id) {
        $this->layout = '//layouts/login';
        if (!Yii::app()->user->isGuest)
            $this->redirect(array('/admin/default/index'));

        $model = $this->loadModel($id);
        if (empty($model) || $model->password_reset_token != $str) {
            Yii::app()->user->setFlash('danger', "Not a valid Reset Link");
            $this->redirect(array('/admin/default/login'));
        } else {
            $start = strtotime(date('Y-m-d H:i:s', $model->updated_at));
            $end = strtotime(date('Y-m-d H:i:s'));
            $seconds = $end - $start;
            $days    = floor($seconds / 86400);
            $hours   = floor(($seconds - ($days * 86400)) / 3600);
            $minutes = floor(($seconds - ($days * 86400) - ($hours * 3600))/60);

            if ($minutes > 5) {
                Yii::app()->user->setFlash('danger', "This Reset Link Expired. Please Try again.");
                $this->redirect(array('/admin/user/forgot'));
            }
        }

        $model->setScenario('reset');
        $this->performAjaxValidation($model);
        if (isset($_POST['reset'])) {
            $model->setAttribute('password_hash', Myclass::encrypt($_POST['User']['new_password']));
            $model->setAttribute('password_reset_token', '');
            $model->save(false);
            Yii::app()->user->setFlash('success', "Your Password Changed Successfully.");
            $this->redirect(array('/admin/default/login'));
        }
        $this->render('reset', array('model' => $model));
    }

}
