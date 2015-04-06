<?php
/* @var $this LostpetController */
/* @var $model Lost */

$this->title = 'View #' . $model->lost_id;
$this->breadcrumbs = array(
    'Losts' => array('index'),
    'View ' . 'Lost',
);
?>

<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' => $model->lost_id), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' => $model->lost_id), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'htmlOptions' => array('class' => 'table table-striped table-bordered'),
        'attributes' => array(
//		'lost_id',
            array(
                'name' => 'pet_category_id',
                'type' => 'raw',
                'value' => $model->petCategory->category_name,
            ),
            'pet_name',
            'breed',
            'eye_color',
            'furcolor',
            array(
                'name' => 'sex',
                'type' => 'raw',
                'value' => $model->sex == 0 ? "Female" : "Male",
            ),
            'age',
            'weight',
//            'chipped',
            array(
                'name' => 'chipped',
                'type' => 'raw',
                'value' => $model->chipped == 0 ? "No" : "Yes",
            ),
//            'castrated',
            array(
                'name' => 'castrated',
                'type' => 'raw',
                'value' => $model->castrated == 0 ? "No" : "Yes",
            ),
//            'sterilized',
            array(
                'name' => 'sterilized',
                'type' => 'raw',
                'value' => $model->sterilized == 0 ? "No" : "Yes",
            ),
            'date_of_missing',
            'lost_address',
//		'latitude',
//		'longitude',
//		'pet_country_id',
//		'pet_state_id',
//		'pet_city_id',
            'additional_informations',
            'reward',
//		'pet_user_id',
            array(
                'name' => 'pet_user_id',
                'type' => 'raw',
                'value' => $model->petUser->petUserdetail->user_first_name,
            ),
            'pet_ad_package_id',
//            'status',
            array(
                'name' => 'status',
                'type' => 'raw',
                'value' => $model->status == 0 ? "In-active" : "Active",
            ),
           
//		'created',
//		'updated',
        ),
    ));
    ?>
     <div id="photos" class="tab-pane">
                        <h4>Pet Photos</h4>
                       
                            <?php
                            $getLostPetPhotos = LostPhoto::model()->getLostPetPhotos($model->lost_id);
                            if (!empty($getLostPetPhotos) && count($getLostPetPhotos) > 0) {
                                foreach ($getLostPetPhotos as $photo_key => $photo_value) {
                                    $file = Yii::getPathOfAlias('webroot') . '/uploads/pet_lost/' . $photo_value->photos;
                                    if (file_exists($file)) {
                                        ?>
                                            <span class="thumbnail">
                                                <?php echo CHtml::image(Yii::app()->request->baseUrl . '/uploads/pet_lost/' . $photo_value->photos, $photo_value->photos, array('width' => 100, 'height' => 100)); ?>
                                            </span>
                                        <?php
                                    }
                                }
                            }
                            ?>

                    </div>
    
</div>



