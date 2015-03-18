<?php
/* @var $this CmsContentController */
/* @var $model CmsContent */

$this->title='Create Cms Contents';
$this->breadcrumbs=array(
	'Cms Contents'=>array('index'),
	$this->title,
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
