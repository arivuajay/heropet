<?php

/* @var $this UserController */
/* @var $model User */

$this->title = 'Register Users';
$this->breadcrumbs = array(
    $this->title,
);
?>

<?php $this->renderPartial('_form', array('model' => $model, 'user_profile' => $user_profile)); ?>