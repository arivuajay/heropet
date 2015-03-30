<?php
/* @var $this LostController */
/* @var $model Lost */
/* @var $form CActiveForm */
?>

<div class="container">

    <div class="row">
        <div class="col-md-12">

            <div class="row featured-boxes login">
                <div class="col-sm-12">
                    <div class="featured-box featured-box-secundary default info-content">
                        <div class="box-content">
                            <h4>Create Lost Pet</h4>
                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'lost-form',
                                'htmlOptions' => array(
                                    'class' => 'form-horizontal form-bordered',
                                    'enctype' => 'multipart/form-data'
                                ),
                                'clientOptions' => array(
                                    'validateOnSubmit' => true,
                                ),
                                'enableAjaxValidation' => true,
                            ));
                            ?>
                            <?php echo $form->errorSummary(array($model)); ?>

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

                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'date_of_missing', array('class' => 'col-sm-2 control-label')); ?>
                                <div class="col-sm-5">
                                    <?php echo $form->textField($model, 'date_of_missing', array('class' => 'form-control')); ?>
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
                                        'htmlOptions' => array('disabled' => ''),
                                    ));
                                    ?>
                                    <?php echo $form->error($lost_photos, 'photos'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-7">
                                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create Lost Pet' : 'Save', array('class' => $model->isNewRecord ? 'btn btn-success pull-right' : 'btn btn-primary pull-right')); ?>
                                </div>
                            </div>
                            <?php $this->endWidget(); ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
