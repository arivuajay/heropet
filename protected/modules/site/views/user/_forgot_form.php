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
                            <h4>Forgot Password</h4>
                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'forgot-form',
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
                                <?php echo $form->labelEx($model, 'email', array("class" => "col-md-3 control-label")); ?>
                                <div class="col-md-6">
                                    <?php echo $form->textField($model, 'email', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'email'); ?>
                                </div>
                            </div>
                            
                          
                            <div class="form-group">
                                <div class="col-md-9">
                                    <?php echo CHtml::submitButton('Forgot Password', array('class' => 'btn btn-primary pull-right push-bottom','name' => 'forgot')); ?>
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