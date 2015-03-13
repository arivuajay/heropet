<?php
/* @var $this MastermoduleController */
/* @var $model MasterModule */

$this->title='Create Master Modules';
$this->breadcrumbs=array(
	'Master Modules'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
