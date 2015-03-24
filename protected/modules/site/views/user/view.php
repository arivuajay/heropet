<?php
/* @var $this UserController */
/* @var $model User */

$this->title='View #'.$model->name;
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'View '.'User',
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
		'username',
		'name',
		'password_hash',
		'password_reset_token',
		'email',
		'role',
		'status',
		'created_at',
		'updated_at',
	),
)); ?>
</div>



