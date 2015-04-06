<?php
/* @var $this LostpetController */
/* @var $model Lost */

$this->title='Update Losts: '. $model->lost_id;
$this->breadcrumbs=array(
	'Losts'=>array('index'),
	'Update Losts',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?></div>