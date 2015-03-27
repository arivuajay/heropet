<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="container">

    <div class="row">
        <div class="col-md-12">

            <div class="row featured-boxes login">
                <div class="col-sm-12">
                    <div class="featured-box featured-box-secundary default info-content">
                        <div class="box-content">
                            <h4>Register An Account</h4>
                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'user-form',
                                'htmlOptions' => array(
                                    'enctype' => 'multipart/form-data',
                                    'class' => 'form-horizontal form-bordered'
                                ),
                                'clientOptions' => array(
                                    'validateOnSubmit' => true,
                                ),
                                'enableAjaxValidation' => true,
                            ));
                            ?>
                            <?php echo $form->errorSummary(array($model, $user_profile)); ?>

                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'email', array("class" => "col-md-3 control-label")); ?>
                                <div class="col-md-6">
                                    <?php echo $form->textField($model, 'email', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'email'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo $form->labelEx($user_profile, 'user_first_name', array("class" => "col-md-3 control-label")); ?>
                                <div class="col-md-6">
                                    <?php echo $form->textField($user_profile, 'user_first_name', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($user_profile, 'user_first_name'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo $form->labelEx($user_profile, 'user_last_name', array("class" => "col-md-3 control-label")); ?>
                                <div class="col-md-6">
                                    <?php echo $form->textField($user_profile, 'user_last_name', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($user_profile, 'user_last_name'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo $form->labelEx($user_profile, 'user_address', array("class" => "col-md-3 control-label")); ?>
                                <div class="col-md-6">
                                    <?php echo $form->textField($user_profile, 'user_address', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($user_profile, 'user_address'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo $form->labelEx($user_profile, 'user_phone', array("class" => "col-md-3 control-label")); ?>
                                <div class="col-md-6">
                                    <?php echo $form->textField($user_profile, 'user_phone', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($user_profile, 'user_phone'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo $form->labelEx($user_profile, 'user_mobile', array("class" => "col-md-3 control-label")); ?>
                                <div class="col-md-6">
                                    <?php echo $form->textField($user_profile, 'user_mobile', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($user_profile, 'user_mobile'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo $form->labelEx($user_profile, 'user_profile_picture', array("class" => "col-md-3 control-label")); ?>
                                <div class="col-md-6">
                                    <?php echo $form->fileField($user_profile, 'user_profile_picture'); ?>
                                    <?php echo $form->error($user_profile, 'user_profile_picture'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-9">
                                    <?php echo CHtml::submitButton('Register', array('class' => 'btn btn-primary pull-right push-bottom')); ?>
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