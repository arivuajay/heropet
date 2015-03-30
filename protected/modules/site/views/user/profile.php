<?php

/* @var $this UserController */
/* @var $model User */

$this->title = 'Update Profile';
$this->breadcrumbs = array(
    $this->title,
);
?>

<?php $this->renderPartial('_profile_form', array('model' => $model, 'user_profile' => $user_profile)); ?>