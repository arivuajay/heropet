<?php
/* @var $this CmsContentController */
/* @var $model CmsContent */

$this->title='View #'.$model->id;
$this->breadcrumbs=array(
	'Cms Contents'=>array('index'),
	'View '.'CmsContent',
);
?>

<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' =>  $model->id ), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' =>  $model->id ), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
	'attributes'=>array(
		'id',
		'heading',
		'body',
		'url',
		'pageTitle',
		'metaTitle',
		'metaDescription',
		'metaKeywords',
	),
)); ?>
</div>



