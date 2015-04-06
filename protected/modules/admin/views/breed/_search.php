<?php
/* @var $this BreedController */
/* @var $model Breed */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'breed_id'); ?>
		<?php echo $form->textField($model,'breed_id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pet_category_id'); ?>
		<?php echo $form->textField($model,'pet_category_id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'breed_name'); ?>
		<?php echo $form->textField($model,'breed_name',array('class'=>'form-control','size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created'); ?>
		<?php echo $form->textField($model,'created',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'update'); ?>
		<?php echo $form->textField($model,'update',array('class'=>'form-control')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->