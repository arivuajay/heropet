<?php
/* @var $this MastermoduleController */
/* @var $model MasterModule */

$this->title='View #'.$model->Master_Module_ID;
$this->breadcrumbs=array(
	'Master Modules'=>array('index'),
	'View '.'MasterModule',
);
?>

<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' =>  $model->Master_Module_ID ), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' =>  $model->Master_Module_ID ), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
	'attributes'=>array(
		'Master_Module_ID',
		'Module_Code',
		'Description',
		'Active',
		'Created_Date',
		'Rowversion',
	),
)); ?>
</div>



