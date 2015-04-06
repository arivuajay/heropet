<?php
/* @var $this LostpetController */
/* @var $data Lost */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('lost_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->lost_id), array('view', 'id'=>$data->lost_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pet_category_id')); ?>:</b>
	<?php echo CHtml::encode($data->pet_category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pet_name')); ?>:</b>
	<?php echo CHtml::encode($data->pet_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('breed')); ?>:</b>
	<?php echo CHtml::encode($data->breed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eye_color')); ?>:</b>
	<?php echo CHtml::encode($data->eye_color); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('furcolor')); ?>:</b>
	<?php echo CHtml::encode($data->furcolor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sex')); ?>:</b>
	<?php echo CHtml::encode($data->sex); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('age')); ?>:</b>
	<?php echo CHtml::encode($data->age); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weight')); ?>:</b>
	<?php echo CHtml::encode($data->weight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('chipped')); ?>:</b>
	<?php echo CHtml::encode($data->chipped); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('castrated')); ?>:</b>
	<?php echo CHtml::encode($data->castrated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sterilized')); ?>:</b>
	<?php echo CHtml::encode($data->sterilized); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_of_missing')); ?>:</b>
	<?php echo CHtml::encode($data->date_of_missing); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lost_address')); ?>:</b>
	<?php echo CHtml::encode($data->lost_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('latitude')); ?>:</b>
	<?php echo CHtml::encode($data->latitude); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('longitude')); ?>:</b>
	<?php echo CHtml::encode($data->longitude); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pet_country_id')); ?>:</b>
	<?php echo CHtml::encode($data->pet_country_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pet_state_id')); ?>:</b>
	<?php echo CHtml::encode($data->pet_state_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pet_city_id')); ?>:</b>
	<?php echo CHtml::encode($data->pet_city_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('additional_informations')); ?>:</b>
	<?php echo CHtml::encode($data->additional_informations); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reward')); ?>:</b>
	<?php echo CHtml::encode($data->reward); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pet_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->pet_user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pet_ad_package_id')); ?>:</b>
	<?php echo CHtml::encode($data->pet_ad_package_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated')); ?>:</b>
	<?php echo CHtml::encode($data->updated); ?>
	<br />

	*/ ?>

</div>