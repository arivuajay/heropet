<?php

/* @var $this UserController */
/* @var $model User */

$this->title = 'Reset Password';
$this->breadcrumbs = array(
    $this->title,
);
?>

<?php $this->renderPartial('_reset_newpass__form', array('model' => $model)); ?>