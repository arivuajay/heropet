<?php
/* @var $this MastermoduleController */
/* @var $model MasterModule */

$this->title='Update Master Modules: '. $model->Master_Module_ID;
$this->breadcrumbs=array(
	'Master Modules'=>array('index'),
	'Update Master Modules',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>