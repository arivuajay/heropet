<?php
/* @var $this LostpetController */
/* @var $dataProvider CActiveDataProvider */

$this->title = 'Losts';
$this->breadcrumbs = array(
    'Losts',
);
?>

<div class="col-lg-12 col-md-12">
    <div class="row mb10">
        <?php echo CHtml::link('<i class="fa fa-plus"></i>&nbsp;&nbsp;Create Lost', array('/site/lost/create'), array('class' => 'btn btn-success pull-right')); ?>
    </div>
</div>

<div class="col-lg-12 col-md-12">
    <div class="row">
        <?php
        $gridColumns = array(
            array(
                'class' => 'IndexColumn',
                'header' => '',
            ),
            array(
                'name' => 'pet_category_id',
                'value' => '$data->petCategory->category_name',
            ),
            'pet_name',
            'breed',
            'eye_color',
            'furcolor',
//            'sex',
            array(
                'name' => 'sex',
                'value' => '$data->sex == 0 ? "Female" : "Male"',
            ),
            /*
              'age',
              'weight',
              'chipped',
              'castrated',
              'sterilized',
              'date_of_missing',
              'lost_address',
              'latitude',
              'longitude',
              'pet_country_id',
              'pet_state_id',
              'pet_city_id',
              'additional_informations',
              'reward',
              'pet_user_id',
              'pet_ad_package_id',
              'status',
              'created',
              'updated',
             */
            array(
                'header' => 'Actions',
                'class' => 'booster.widgets.TbButtonColumn',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle', 'class' => 'action_column'),
                'template' => '{view}{update}{delete}',
            )
        );

        $this->widget('booster.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered',
            'dataProvider' => $model->dataProvider(),
            'responsiveTable' => true,
            'template' => '<div class="panel panel-primary"><div class="panel-heading"><div class="pull-right">{summary}</div><h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Losts</h3></div><div class="panel-body">{items}{pager}</div></div>',
            'columns' => $gridColumns
                )
        );
        ?>
    </div>
</div>