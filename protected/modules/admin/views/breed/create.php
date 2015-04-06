<?php
/* @var $this BreedController */
/* @var $model Breed */

$this->title='Create Breeds';
$this->breadcrumbs=array(
	'Breeds'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
