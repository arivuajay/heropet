<?php
/* @var $this BreedController */
/* @var $data Breed */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('breed_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->breed_id), array('view', 'id'=>$data->breed_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pet_category_id')); ?>:</b>
	<?php echo CHtml::encode($data->pet_category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('breed_name')); ?>:</b>
	<?php echo CHtml::encode($data->breed_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update')); ?>:</b>
	<?php echo CHtml::encode($data->update); ?>
	<br />


</div>