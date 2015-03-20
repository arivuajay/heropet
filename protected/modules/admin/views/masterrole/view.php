<?php
/* @var $this MasterroleController */
/* @var $model MasterRole */

$this->title='View #'.$model->Master_Role_ID;
$this->breadcrumbs=array(
	'Master Roles'=>array('index'),
	'View Master Role',
);
?>

<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' =>  $model->Master_Role_ID ), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' =>  $model->Master_Role_ID ), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
	'attributes'=>array(
		'Master_Role_ID',
		'Role_Code',
		'Description',
                array(
                    'name'=>'is_Admin',
                    'type'=>'raw',
                    'value'=> $model->is_Admin==1 ? "<i class='fa fa-circle text-green'></i>" : "<i class='fa fa-circle text-red'></i>"
                ), 
		array(
                    'name'=>'Active',
                    'type'=>'raw',
                    'value'=> $model->Active==1 ? "<i class='fa fa-circle text-green'></i>" : "<i class='fa fa-circle text-red'></i>"
                ),            
		'Created_Date',
		'Rowversion',
	),
)); ?>
</div>



