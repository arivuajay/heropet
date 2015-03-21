<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->title='Update Category: '. $model->category_id;
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Update Category',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>