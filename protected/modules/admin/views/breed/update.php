<?php
/* @var $this BreedController */
/* @var $model Breed */

$this->title='Update Breeds: '. $model->breed_id;
$this->breadcrumbs=array(
	'Breeds'=>array('index'),
	'Update Breeds',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>