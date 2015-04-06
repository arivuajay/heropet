<?php
/* @var $this LostpetController */
/* @var $model Lost */

$this->breadcrumbs=array(
	'Losts'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Lost', 'url'=>array('index')),
	array('label'=>'Create Lost', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#lost-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Losts</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'lost-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'lost_id',
		'pet_category_id',
		'pet_name',
		'breed',
		'eye_color',
		'furcolor',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
