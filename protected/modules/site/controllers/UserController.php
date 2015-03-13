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
                    $nextstep_url = Yii::app()->createAbsoluteUrl('/site/default/login');
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

}
