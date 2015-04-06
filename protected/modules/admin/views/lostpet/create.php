<?php
/* @var $this LostpetController */
/* @var $model Lost */

$this->title='Create Losts';
$this->breadcrumbs=array(
	'Losts'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
