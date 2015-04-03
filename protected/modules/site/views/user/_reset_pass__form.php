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
                            <h4>Change Password</h4>
                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'user-reset',
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
                            <?php echo $form->errorSummary(array($model)); ?>

                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'currentpassword', array("class" => "col-md-3 control-label")); ?>
                                <div class="col-md-6">
                                    <?php echo $form->passwordField($model, 'currentpassword', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'currentpassword'); ?>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'sitenew_password', array("class" => "col-md-3 control-label")); ?>
                                <div class="col-md-6">
                                    <?php echo $form->passwordField($model, 'sitenew_password', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'sitenew_password'); ?>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'siteconfirm_password', array("class" => "col-md-3 control-label")); ?>
                                <div class="col-md-6">
                                    <?php echo $form->passwordField($model, 'siteconfirm_password', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'siteconfirm_password'); ?>
                                </div>
                            </div>

                          
                            <div class="form-group">
                                <div class="col-md-9">
                                    <?php echo CHtml::submitButton('Update', array('class' => 'btn btn-primary pull-right push-bottom')); ?>
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