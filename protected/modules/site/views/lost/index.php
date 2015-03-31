<?php
/* @var $this LostController */
/* @var $dataProvider CActiveDataProvider */

$this->title = 'Lost Pets';
$this->breadcrumbs = array(
    'Lost Pets',
);
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p class="pull-right">
                <?php echo CHtml::link('Create Lost Pet', array('create'), array('class' => 'btn btn-info')); ?>
            </p>
        </div>
    </div>

    <div class="table-responsive">
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'user-grid',
            'dataProvider' => $model->search(),
            'template' => '{items}{summary}{pager}',
            'columns' => array(
                array(
                    'name' => 'pet_category_id',
                    'value' => '$data->petCategory->category_name',
                ),
                'pet_name',
                'breed',
                'date_of_missing',
                array(
                    'class' => 'CButtonColumn',
                    'template' => '{view} {update} {delete}',
                    'buttons' => array
                        (
                        'view' => array
                            (
                            'label' => '<i class="fa fa-search-minus"></i>',
                            'options' => array('title' => 'View'),
                            'imageUrl' => false,
                        ),
                        'update' => array
                            (
                            'label' => '<i class="fa fa-pencil"></i>',
                            'options' => array('title' => 'Update'),
                            'imageUrl' => false,
                        ),
                        'delete' => array
                            (
                            'label' => '<i class="fa fa-close"></i>',
                            'options' => array('title' => 'Delete'),
                            'imageUrl' => false,
                        ),
                    ),
                ),
            ),
            'itemsCssClass' => 'table table-bordered table-striped table-condensed mb-none',
        ));
        ?>
    </div>

</div>