<?php
/* @var $this LostController */
/* @var $model Lost */
/* @var $form CActiveForm */
?>

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'lost-form',
                'htmlOptions' => array(
                    'class' => 'form-horizontal',
                    'enctype' => 'multipart/form-data'
                ),
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
                'enableAjaxValidation' => true,
            ));
            ?>
            <?php echo $form->errorSummary(array($model, $lost_photos)); ?>
            <div class="tabs">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active">
                        <a href="#w2-account" data-toggle="tab" class="text-center">
                            <span class="badge hidden-xs">1</span>
                            Pet Basic Information
                        </a>
                    </li>
                    <li>
                        <a href="#w2-profile" data-toggle="tab" class="text-center">
                            <span class="badge hidden-xs">2</span>
                            Missing Details
                        </a>
                    </li>
                    <li>
                        <a href="#w2-confirm" data-toggle="tab" class="text-center">
                            <span class="badge hidden-xs">3</span>
                            Photos
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="w2-account" class="tab-pane active">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'pet_category_id', array('class' => 'col-sm-2 control-label')); ?>
                            <div class="col-sm-5">
                                <?php
                                $categories = CHtml::listData(Category::model()->findAll('status=:status', array(
                                                    ':status' => '1',
                                                )), 'category_id', 'category_name');
                                echo $form->dropDownList($model, 'pet_category_id', $categories, array('class' => 'form-control', 'prompt' => 'Select'));
                                ?>
                                <?php echo $form->error($model, 'pet_category_id'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'pet_name', array('class' => 'col-sm-2 control-label')); ?>
                            <div class="col-sm-5">
                                <?php echo $form->textField($model, 'pet_name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 500)); ?>
                                <?php echo $form->error($model, 'pet_name'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'breed', array('class' => 'col-sm-2 control-label')); ?>
                            <div class="col-sm-5">
                                <?php echo $form->textField($model, 'breed', array('class' => 'form-control', 'size' => 60, 'maxlength' => 500)); ?>
                                <?php echo $form->error($model, 'breed'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'eye_color', array('class' => 'col-sm-2 control-label')); ?>
                            <div class="col-sm-5">
                                <?php echo $form->textField($model, 'eye_color', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                                <?php echo $form->error($model, 'eye_color'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'furcolor', array('class' => 'col-sm-2 control-label')); ?>
                            <div class="col-sm-5">
                                <?php echo $form->textField($model, 'furcolor', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
                                <?php echo $form->error($model, 'furcolor'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'sex', array('class' => 'col-sm-2 control-label')); ?>
                            <div class="col-sm-5">
                                <?php
                                echo $form->dropDownList($model, 'sex', array('Female', 'Male'), array('class' => 'form-control', 'prompt' => 'Select'));
                                ?>
                                <?php echo $form->error($model, 'sex'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'age', array('class' => 'col-sm-2 control-label')); ?>
                            <div class="col-sm-5">
                                <?php
                                echo $form->textField($model, 'age', array('class' => 'form-control'));
                                ?>
                                <?php echo $form->error($model, 'age'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'weight', array('class' => 'col-sm-2 control-label')); ?>
                            <div class="col-sm-5">
                                <?php echo $form->textField($model, 'weight', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                                <?php echo $form->error($model, 'weight'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'chipped', array('class' => 'col-sm-2 control-label')); ?>
                            <div class="col-sm-5">
                                <?php echo $form->dropDownList($model, 'chipped', array('No', 'Yes'), array('class' => 'form-control', 'prompt' => 'Select')); ?>
                                <?php echo $form->error($model, 'chipped'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'castrated', array('class' => 'col-sm-2 control-label')); ?>
                            <div class="col-sm-5">
                                <?php echo $form->dropDownList($model, 'castrated', array('No', 'Yes'), array('class' => 'form-control', 'prompt' => 'Select')); ?>
                                <?php echo $form->error($model, 'castrated'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'sterilized', array('class' => 'col-sm-2 control-label')); ?>
                            <div class="col-sm-5">
                                <?php echo $form->dropDownList($model, 'sterilized', array('No', 'Yes'), array('class' => 'form-control', 'prompt' => 'Select')); ?>
                                <?php echo $form->error($model, 'sterilized'); ?>
                            </div>
                        </div>

                    </div>

                    <div id="w2-profile" class="tab-pane">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'date_of_missing', array('class' => 'col-sm-2 control-label')); ?>
                            <div class="col-sm-5">
                                <?php
                                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                    'model' => $model,
                                    'name' => 'Lost[date_of_missing]',
                                    'value' => $model->date_of_missing,
                                    'options' => array(
                                        'dateFormat' => 'yy-mm-dd',
                                    ),
                                    'htmlOptions' => array(
                                        'class' => 'form-control'
                                    )
                                ));
                                ?>
                                <?php echo $form->error($model, 'date_of_missing'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'lost_address', array('class' => 'col-sm-2 control-label')); ?>
                            <div class="col-sm-5">
                                <?php echo $form->textField($model, 'lost_address', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'lost_address'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'additional_informations', array('class' => 'col-sm-2 control-label')); ?>
                            <div class="col-sm-5">
                                <?php echo $form->textArea($model, 'additional_informations', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
                                <?php echo $form->error($model, 'additional_informations'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'reward', array('class' => 'col-sm-2 control-label')); ?>
                            <div class="col-sm-5">
                                <?php echo $form->textField($model, 'reward', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
                                <?php echo $form->error($model, 'reward'); ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'pet_ad_package_id', array('class' => 'col-sm-2 control-label')); ?>
                            <div class="col-sm-5">
                                <?php
                                $packages = AdPackage::model()->adPackageList();
                                echo $form->dropDownList($model, 'pet_ad_package_id', $packages, array('class' => 'form-control', 'prompt' => 'Select'));
                                ?>
                                <?php echo $form->error($model, 'pet_ad_package_id'); ?>
                            </div>
                        </div>
                    </div>

                    <div id="w2-confirm" class="tab-pane">
                        <div class="form-group">
                            <?php echo $form->labelEx($lost_photos, 'photos', array('class' => 'col-sm-2 control-label')); ?>
                            <div class="col-sm-5">
                                <?php
                                $this->widget('CMultiFileUpload', array(
                                    'model' => $lost_photos,
                                    'attribute' => 'photos',
                                    'accept' => 'jpeg|jpg|png',
                                    'max' => 5,
                                    'duplicate' => 'file appears twice',
                                    'remove' => 'Remove',
                                ));
                                ?>
                                <?php echo $form->error($lost_photos, 'photos'); ?>
                            </div>
                        </div>

                        <?php if (!$model->isNewRecord): ?>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <ul class="thumbnail-gallery flickr-feed">
                                        <?php
                                        $getLostPetPhotos = LostPhoto::model()->getLostPetPhotos($model->lost_id);
                                        if (!empty($getLostPetPhotos) && count($getLostPetPhotos) > 0) {
                                            foreach ($getLostPetPhotos as $photo_key => $photo_value) {
                                                $file = Yii::getPathOfAlias('webroot') . '/uploads/pet_lost/' . $photo_value->photos;
                                                if (file_exists($file)) {
                                                    ?>
                                                    <li id="<?php echo 'photo_' . $photo_value->lost_photo_id; ?>">
                                                        <span class="thumbnail">
                                                            <?php echo CHtml::image(Yii::app()->request->baseUrl . '/uploads/pet_lost/' . $photo_value->photos, $photo_value->photos, array('width' => 100, 'height' => 100)); ?>
                                                        </span><br>
                                                        <a onclick="deleteLostPetImage(<?php echo $photo_value->lost_photo_id ?>)">Remove</a>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <div class="col-md-7">
                                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create Lost Pet' : 'Save', array('class' => $model->isNewRecord ? 'btn btn-success pull-right' : 'btn btn-primary pull-right')); ?>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>

<script>
    function deleteLostPetImage(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->createUrl('site/lost/deleteLostPetPhoto'); ?>",
            data: {lost_photo_id: id},
            success: function(msg) {
                if (msg == 'Success') {
                    $("#photo_" + id).remove();
                }
            },
            error: function(xhr) {
                alert("failure" + xhr.readyState + this.url)
            }
        });
    }
</script>