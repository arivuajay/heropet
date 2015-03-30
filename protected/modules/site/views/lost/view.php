<?php
/* @var $this LostController */
/* @var $model Lost */

$this->title='View #'.$model->lost_id;
$this->breadcrumbs=array(
	'Losts'=>array('index'),
	'View '.'Lost',
);
?>

<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' =>  $model->lost_id ), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' =>  $model->lost_id ), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
	'attributes'=>array(
		'lost_id',
		'pet_category_id',
		'pet_name',
		'breed',
		'eye_color',
		'furcolor',
		'sex',
		'age',
		'weight',
		'chipped',
		'castrated',
		'sterilized',
		'date_of_missing',
		'lost_address',
		'latitude',
		'longitude',
		'pet_country_id',
		'pet_state_id',
		'pet_city_id',
		'additional_informations',
		'reward',
		'pet_user_id',
		'pet_ad_package_id',
		'status',
		'created',
		'updated',
	),
)); ?>
</div>



