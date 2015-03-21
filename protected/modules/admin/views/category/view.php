<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->title = 'View #' . $model->category_id;
$this->breadcrumbs = array(
    'Categories' => array('index'),
    'View Category',
);
?>

<div class="user-view">
    <p>
        <?php echo CHtml::link('Update', array('update', 'id' => $model->category_id), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::link('Delete', array('delete', 'id' => $model->category_id), array('confirm' => 'Are you sure you want to delete this item?', 'class' => 'btn btn-danger'));
        ?>
    </p>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'htmlOptions' => array('class' => 'table table-striped table-bordered'),
        'attributes' => array(
            'category_id',
            'category_name',
            array(
                'name' => 'category_image',
                'type' => 'raw',
                'value' => $model->category_image != '' ? CHtml::image(Yii::app()->request->baseUrl . '/uploads/pet_category/' . $model->category_image, $model->category_image, array('width' => 100, 'height' => 100)) : "-"
            ),
            array(
                'name' => 'status',
                'type' => 'raw',
                'value' => $model->status == 1 ? "Active" : "In-Active"
            ),
            'created',
            'updated',
        ),
    ));
    ?>
</div>



