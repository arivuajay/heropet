<?php
/* @var $this MasterroleController */
/* @var $model MasterRole */

$this->title = 'Update Master Role: ' . $model->Master_Role_ID;
$this->breadcrumbs = array(
    'Master Roles' => array('index'),
    'Update Master Role',
);
?>

<div class="user-create">
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>