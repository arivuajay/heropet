<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->title='Create Category';
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
