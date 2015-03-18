<?php
/* @var $this CmsContentController */
/* @var $model CmsContent */

$this->title='Update Cms Contents: '. $model->id;
$this->breadcrumbs=array(
	'Cms Contents'=>array('index'),
	'Update Cms Contents',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>