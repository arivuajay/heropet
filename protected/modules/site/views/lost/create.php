<?php

/* @var $this LostController */
/* @var $model Lost */

$this->title = 'Create Lost Pet';
$this->breadcrumbs = array(
    'Lost Pets' => array('index'),
    $this->title,
);
?>

<?php $this->renderPartial('_form', array('model' => $model, 'lost_photos' => $lost_photos)); ?>
