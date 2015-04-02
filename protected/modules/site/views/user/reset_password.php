<?php

/* @var $this UserController */
/* @var $model User */

$this->title = 'Reset Password';
$this->breadcrumbs = array(
    $this->title,
);
?>

<?php $this->renderPartial('_reset_pass__form', array('model' => $model)); ?>