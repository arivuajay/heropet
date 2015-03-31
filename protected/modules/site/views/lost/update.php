<?php

/* @var $this LostController */
/* @var $model Lost */

$this->title = 'Update Lost Pet';
$this->breadcrumbs = array(
    'Losts' => array('index'),
    'Update Lost Pet',
);
?>

<?php $this->renderPartial('_form', array('model' => $model, 'lost_photos' => $lost_photos)); ?>