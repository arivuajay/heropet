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
                            <h4>Reset Password</h4>
                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'reset-form',
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
                                <?php echo $form->labelEx($model, 'new_password', array("class" => "col-md-3 control-label")); ?>
                                <div class="col-md-6">
                                    <?php echo $form->textField($model, 'new_password', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'new_password'); ?>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'confirm_password', array("class" => "col-md-3 control-label")); ?>
                                <div class="col-md-6">
                                    <?php echo $form->textField($model, 'confirm_password', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'confirm_password'); ?>
                                </div>
                            </div>
                            
                           
                          
                            <div class="form-group">
                                <div class="col-md-9">
                                    <?php echo CHtml::submitButton('Reset Password', array('class' => 'btn btn-primary pull-right push-bottom','name' => 'reset')); ?>
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