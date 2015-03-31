<?php

class LostController extends Controller {
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
                'actions' => array(''),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'view', 'create', 'update', 'delete', 'deleteLostPetPhoto'),
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
     * Lists all models.
     */
    public function actionIndex() {
        $model = new Lost('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Lost']))
            $model->attributes = $_GET['Lost'];

        $this->render('index', array(
            'model' => $model,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Lost;
        $lost_photos = new LostPhoto;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation(array($model, $lost_photos));

        if (isset($_POST['Lost'])) {
            $model->attributes = $_POST['Lost'];
            $model->pet_user_id = Yii::app()->user->id;

            $egmap = new EasyGoogleMap();
            $lost_address = $egmap->getCurrentPosition($model->lost_address);

            $model->latitude = $lost_address['lat'];
            $model->longitude = $lost_address['lng'];

            // validate BOTH $model and $user_profile
            $valid = $model->validate();
            $valid = $lost_photos->validate() && $valid;

            if ($valid) {

                $country_id = Country::model()->checkCountry($lost_address['country'], $lost_address['country_code']);
                $state_id = State::model()->checkState($country_id, $lost_address['state'], $lost_address['state_code']);
                $city_id = City::model()->checkCity($country_id, $state_id, $lost_address['city']);

                $model->pet_country_id = $country_id;
                $model->pet_state_id = $state_id;
                $model->pet_city_id = $city_id;

                if ($model->save()) {
                    if (isset($_FILES['LostPhoto'])) {
                        $images = CUploadedFile::getInstancesByName('LostPhoto[photos]');
                        $this->actionSaveImagesDB($images, $model->lost_id);
                    }
                    Yii::app()->user->setFlash('success', 'Lost Pet Created Successfully!!!');
                    $this->redirect(array('index'));
                }
            }
        }

        $this->render('create', array(
            'model' => $model,
            'lost_photos' => $lost_photos
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $lost_photos = new LostPhoto;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation(array($model, $lost_photos));

        if (isset($_POST['Lost'])) {

            $model->attributes = $_POST['Lost'];
            $model->pet_user_id = Yii::app()->user->id;

            $egmap = new EasyGoogleMap();
            $lost_address = $egmap->getCurrentPosition($model->lost_address);

            $model->latitude = $lost_address['lat'];
            $model->longitude = $lost_address['lng'];

            // validate BOTH $model and $user_profile
            $valid = $model->validate();
            $valid = $lost_photos->validate() && $valid;

            if ($valid) {
                $country_id = Country::model()->checkCountry($lost_address['country'], $lost_address['country_code']);
                $state_id = State::model()->checkState($country_id, $lost_address['state'], $lost_address['state_code']);
                $city_id = City::model()->checkCity($country_id, $state_id, $lost_address['city']);

                $model->pet_country_id = $country_id;
                $model->pet_state_id = $state_id;
                $model->pet_city_id = $city_id;

                if ($model->save()) {
                    if (isset($_FILES['LostPhoto'])) {
                        $images = CUploadedFile::getInstancesByName('LostPhoto[photos]');
                        $this->actionSaveImagesDB($images, $model->lost_id);
                    }
                    Yii::app()->user->setFlash('success', 'Lost Pet Updated Successfully!!!');
                    $this->redirect(array('index'));
                }
            }
        }

        $this->render('update', array(
            'model' => $model,
            'lost_photos' => $lost_photos
        ));
    }

    public function actionSaveImagesDB($images, $lost_pet_id) {
        // proceed if the images have been set
        if (isset($images) && count($images) > 0) {

            // go through each uploaded image
            foreach ($images as $image => $pic) {
                $random_string = Myclass::getRandomString(5);
                $fileName = "{$random_string}-{$pic->name}";
                if ($pic->saveAs(Yii::getPathOfAlias('webroot') . '/uploads/pet_lost/' . $fileName)) {
                    // add it to the main model now
                    $lost_photos = new LostPhoto;
                    $lost_photos->photos = $fileName;
                    $lost_photos->pet_lost_id = $lost_pet_id;
                    $lost_photos->save();
                } else {
                    echo 'Cannot upload!';
                }
            }
        }
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $model = $this->loadModel($id);
        $lost_photos = LostPhoto::model()->findAll('pet_lost_id = :pet_lost_id', array(':pet_lost_id' => $model->lost_id));

        if (!empty($lost_photos) && count($lost_photos) > 0) {
            foreach ($lost_photos as $lost_key => $lost_value) {
                $file = Yii::getPathOfAlias('webroot') . '/uploads/pet_lost/' . $lost_value->photos;
                if (file_exists($file)) {
                    unlink($file);
                }
            }
        }

        LostPhoto::model()->deleteAll('pet_lost_id = :pet_lost_id', array(':pet_lost_id' => $model->lost_id));

        $model->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            Yii::app()->user->setFlash('success', 'Lost Deleted Successfully!!!');
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
    }

    //AJAX delete lost pet photo one by one
    public function actionDeleteLostPetPhoto() {
        if (isset($_POST['lost_photo_id'])) {
            $lost_pet_photo = LostPhoto::model()->find('lost_photo_id = :lost_photo_id', array(':lost_photo_id' => $_POST['lost_photo_id']));
            if (!empty($lost_pet_photo)) {
                $file = Yii::getPathOfAlias('webroot') . '/uploads/pet_lost/' . $lost_pet_photo->photos;
                if (file_exists($file)) {
                    unlink($file);
                }
                LostPhoto::model()->deleteByPk($_POST['lost_photo_id']);
                echo "Success";
            }
        }exit;
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Lost the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Lost::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Lost $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'lost-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
