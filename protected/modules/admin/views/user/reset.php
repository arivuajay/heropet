<?php
$this->title = 'Reset Password';
$this->breadcrumbs = array(
    $this->title
);
?>
<div class="form-box" id="login-box">

    <div class="header"><?php echo CHtml::encode($this->title) ?></div>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'reset-form',
        'enableAjaxValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        )
    ));
    ?>
    <div class="body bg-gray">
        <?php if (isset($this->flashMessages)): ?>
    <?php foreach ($this->flashMessages as $key => $message) { ?>
                <div class="alert alert-<?php echo $key; ?> fade in">
                    <button type="button" class="close close-sm" data-dismiss="alert">
                        <i class="fa fa-times"></i>
                    </button>
                <?php echo $message; ?>
                </div>
            <?php } ?>
            <?php endif ?>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'new_password') ?>
            <?php echo $form->textField($model, 'new_password', array('autofocus', 'class' => 'form-control')); ?>
<?php echo $form->error($model, 'new_password') ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'confirm_password') ?>
            <?php echo $form->textField($model, 'confirm_password', array('autofocus', 'class' => 'form-control')); ?>
<?php echo $form->error($model, 'confirm_password') ?>
        </div>

    </div>
    <div class="footer">
    <?php echo CHtml::submitButton('Reset Password', array('class' => 'btn bg-olive btn-block', 'name' => 'reset')) ?>
    </div>
<?php $this->endWidget(); ?>
</div>