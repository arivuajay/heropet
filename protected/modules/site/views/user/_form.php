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
                                'clientOptions' => array(
                                    'validateOnSubmit' => true,
                                ),
                                'enableAjaxValidation' => true,
                            ));
                            ?>
                            <?php echo $form->errorSummary(array($model, $user_profile)); ?>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <?php echo $form->labelEx($model, 'email'); ?>
                                        <?php echo $form->textField($model, 'email', array('class' => 'form-control input-lg')); ?>
                                        <?php echo $form->error($model, 'email'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <?php echo $form->labelEx($user_profile, 'user_address'); ?>
                                        <?php echo $form->textField($user_profile, 'user_address', array('class' => 'form-control input-lg')); ?>
                                        <?php echo $form->error($user_profile, 'user_address'); ?>
                                    </div>
                                </div>
                            </div>                            

                            <div class="row">
                                <div class="col-md-12">
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