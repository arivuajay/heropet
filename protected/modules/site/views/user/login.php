<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */

$this->title = 'Login User';
$this->breadcrumbs = array(
    $this->title,
);
?>

<div class="container">

    <div class="row">
        <div class="col-md-12">

            <div class="row featured-boxes login">
                <div class="col-sm-12">
                    <div class="featured-box featured-box-secundary default info-content">
                        <div class="box-content">
                            <h4>Login</h4>
                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'login-form',
                                'htmlOptions' => array(
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
                                <?php echo $form->labelEx($model, 'email', array("class" => "col-md-3 control-label")); ?>
                                <div class="col-md-6">
                                    <?php echo $form->textField($model, 'email', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'email'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'password', array("class" => "col-md-3 control-label")); ?>
                                <div class="col-md-6">
                                    <?php echo $form->passwordField($model, 'password', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'password'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-9">
                                    <?php echo CHtml::submitButton('Login', array('class' => 'btn btn-primary pull-right push-bottom')); ?>
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