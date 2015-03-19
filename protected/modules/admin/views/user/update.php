<?php
/* @var $this UserController */
/* @var $model User */

$this->title = "Update User: {$model->id}";
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Update User',
);
?>
<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>