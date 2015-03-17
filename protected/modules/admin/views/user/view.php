<?php
$this->title = 'View User #'.$model->name;
$this->breadcrumbs = array(
    'Users' => array('index'),
    'View User',
);
?>

<div class="user-view">
    <p>
        <?= CHtml::link('Update', array('update', 'id' => $model->id), array('class' => 'btn btn-primary')); ?>
        <?= CHtml::link('Delete', array('delete', 'id' => $model->id), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'htmlOptions' => array('class'=>'table table-striped table-bordered'),
        'attributes' => array(
            'id',
            'username',
            'name',
            array(
                'label' => $model->getAttributeLabel('email'),
                'type'  => 'html',
                'value' => CHtml::link($model->email,"maito:{$model->email}")
            ),
            array(
                'label' => $model->getAttributeLabel('role'),
                'value' => $model->roleMdl->Description,
            ),
            array(
                'label' => $model->getAttributeLabel('status'),
                'value' => $model->status == '1' ? 'Active' : 'In-Active'
            ),
        ),
    ));
    ?>
</div>