<?php
/* @var $this BreedController */
/* @var $model Breed */

$this->title='View #'.$model->breed_id;
$this->breadcrumbs=array(
	'Breeds'=>array('index'),
	'View '.'Breed',
);
?>

<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' =>  $model->breed_id ), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' =>  $model->breed_id ), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
	'attributes'=>array(
//		'breed_id',
//		'pet_category_id',
            array(
                'name' => 'pet_category_id',
                'type' => 'raw',
                'value' => $model->petCategory->category_name,
            ),
		'breed_name',
		'created',
		'update',
	),
)); ?>
</div>



