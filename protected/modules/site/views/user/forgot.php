<?php

/* @var $this UserController */
/* @var $model User */

$this->title = 'Forgot Password';
$this->breadcrumbs = array(
    $this->title,
);
?>

<?php $this->renderPartial('_forgot_form', array('model' => $model)); ?>