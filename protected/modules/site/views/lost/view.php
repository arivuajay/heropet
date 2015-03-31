<?php
/* @var $this LostController */
/* @var $model Lost */

$this->title = 'View Lost Pet';
$this->breadcrumbs = array(
    'Lost Pets' => array('index'),
    'View Lost Pet',
);
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p class="pull-right">
                <?php echo CHtml::link('Update', array('update', 'id' => $model->lost_id), array('class' => 'btn btn-primary')); ?>
                <?php echo CHtml::link('Delete', array('delete', 'id' => $model->lost_id), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
                ?>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tabs">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active">
                        <a href="#general_information" data-toggle="tab" class="text-center">
                            <i class="fa fa-star"></i> Pet General Information
                        </a>
                    </li>
                    <li>
                        <a href="#missing_information" data-toggle="tab" class="text-center">
                            <i class="fa fa-map-marker"></i> Pet Missing Information
                        </a>
                    </li>
                    <li>
                        <a href="#photos" data-toggle="tab" class="text-center">
                            <i class="fa fa-photo"></i> Pet Photos
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="general_information" class="tab-pane active">
                        <?php
                        $this->widget('zii.widgets.CDetailView', array(
                            'data' => $model,
                            'htmlOptions' => array('class' => 'table table-striped table-bordered'),
                            'attributes' => array(
                                array(
                                    'label' => 'Pet Category',
                                    'type' => 'raw',
                                    'value' => $model->petCategory->category_name,
                                ),
                                'pet_name',
                                'breed',
                                'eye_color',
                                'furcolor',
                                array(
                                    'label' => 'Sex',
                                    'type' => 'raw',
                                    'value' => $model->sex == 0 ? "Female" : "Male",
                                ),
                                'age',
                                'weight',
                                array(
                                    'label' => 'chipped',
                                    'type' => 'raw',
                                    'value' => $model->chipped == 0 ? "No" : "Yes",
                                ),
                                array(
                                    'label' => 'castrated',
                                    'type' => 'raw',
                                    'value' => $model->castrated == 0 ? "No" : "Yes",
                                ),
                                array(
                                    'label' => 'sterilized',
                                    'type' => 'raw',
                                    'value' => $model->sterilized == 0 ? "No" : "Yes",
                                ),
                            ),
                            'nullDisplay' => '-'
                        ));
                        ?>

                    </div>
                    <div id="missing_information" class="tab-pane">
                        <?php
                        $this->widget('zii.widgets.CDetailView', array(
                            'data' => $model,
                            'htmlOptions' => array('class' => 'table table-striped table-bordered'),
                            'attributes' => array(
                                'date_of_missing',
                                'lost_address',
                                'additional_informations',
                                'reward',
                                'pet_ad_package_id',
                                array(
                                    'label' => 'status',
                                    'type' => 'raw',
                                    'value' => $model->status == 0 ? "In-active" : "Active",
                                ),
                                'created',
                            ),
                            'nullDisplay' => '-'
                        ));
                        ?>
                    </div>
                    <div id="photos" class="tab-pane">
                        <h4>Pet Photos</h4>
                        <ul class="thumbnail-gallery flickr-feed">
                            <?php
                            $getLostPetPhotos = LostPhoto::model()->getLostPetPhotos($model->lost_id);
                            if (!empty($getLostPetPhotos) && count($getLostPetPhotos) > 0) {
                                foreach ($getLostPetPhotos as $photo_key => $photo_value) {
                                    $file = Yii::getPathOfAlias('webroot') . '/uploads/pet_lost/' . $photo_value->photos;
                                    if (file_exists($file)) {
                                        ?>
                                        <li>
                                            <span class="thumbnail">
                                                <?php echo CHtml::image(Yii::app()->request->baseUrl . '/uploads/pet_lost/' . $photo_value->photos, $photo_value->photos, array('width' => 100, 'height' => 100)); ?>
                                            </span>
                                        </li>
                                        <?php
                                    }
                                }
                            }
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

