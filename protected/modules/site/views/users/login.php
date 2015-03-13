<?php
$this->title = 'Sign In';
$this->breadcrumbs = array(
    $this->title
);
?>
<div class="form-box" id="login-box">
    <div class="header"><?php echo CHtml::encode($this->title) ?></div>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
        'enableAjaxValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        )
    ));
    if (isset(Yii::app()->request->cookies['wipocos_app_username']->value)) {
        $model->username = Yii::app()->request->cookies['wipocos_app_username']->value;
        $model->rememberMe = 1;
    }
    ?>
    <div class="body bg-gray">
        <p>Please fill out the following fields to login:</p>
        <?php echo $form->textField($model, 'username'); ?>
        <?php echo $form->passwordField($model, 'password'); ?>
        <?php echo $form->checkBox($model, 'rememberMe', array('id' => 'check', 'checked' => 'checked')); ?>
        <?php echo ' Remember Me'; ?>
    </div>
    <div class="footer">
        <?php echo CHtml::submitButton('Login', array('class' => 'btn bg-olive btn-block', 'name' => 'login-button')) ?>
        <p><?php echo CHtml::link('I forgot my password', array('/site/request-password-reset')) ?></p>

    </div>
    <?php $this->endWidget(); ?>
</div>