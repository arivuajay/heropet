<?php
/* @var $this LostpetController */
/* @var $model Lost */
/* @var $form CActiveForm */
?>

<div class="row">
    <div class="col-lg-12 col-xs-12">
        <div class="box box-primary">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'lost-form',
                'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
                'enableAjaxValidation' => true,
            ));
            ?>
            <div class="box-body">
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
                        <?php echo $form->textField($model, 'age', array('class' => 'form-control')); ?>
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
                        <?php echo $form->textArea($model, 'lost_address', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
                        <?php echo $form->error($model, 'lost_address'); ?>
                    </div>
                </div>

<!--                <div class="form-group">
                    <?php echo $form->labelEx($model, 'latitude', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'latitude', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'latitude'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'longitude', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'longitude', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'longitude'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'pet_country_id', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'pet_country_id', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'pet_country_id'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'pet_state_id', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'pet_state_id', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'pet_state_id'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'pet_city_id', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'pet_city_id', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'pet_city_id'); ?>
                    </div>
                </div>-->

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
                    <?php echo $form->labelEx($model, 'pet_user_id', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'pet_user_id', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'pet_user_id'); ?>
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

<!--                <div class="form-group">
                    <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'status', array('class' => 'form-control', 'size' => 1, 'maxlength' => 1)); ?>
                        <?php echo $form->error($model, 'status'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'created', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'created', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'created'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'updated', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'updated', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'updated'); ?>
                    </div>
                </div>-->

            </div><!-- /.box-body -->
            <div class="box-footer">
                <div class="form-group">
                    <div class="col-sm-0 col-sm-offset-2">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
                    </div>
                </div>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div><!-- ./col -->
</div>