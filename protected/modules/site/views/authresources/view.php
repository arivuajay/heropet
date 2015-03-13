<?php
/* @var $this AuthresourcesController */
/* @var $model AuthResources */

$this->title='View #'.$model->Master_Resource_ID;
$this->breadcrumbs=array(
	'Auth Resources'=>array('index'),
	'View '.'AuthResources',
);
?>

<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' =>  $model->Master_Resource_ID ), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' =>  $model->Master_Resource_ID ), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
	'attributes'=>array(
		'Master_Resource_ID',
		'Master_User_ID',
		'Master_Role_ID',
		'Master_Module_ID',
		'Master_Screen_ID',
		'Master_Task_ADD',
		'Master_Task_SEE',
		'Master_Task_UPT',
		'Master_Task_DEL',
		'Active',
		'Created_Date',
		'Rowversion',
	),
)); ?>
</div>



