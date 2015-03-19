<?php
$this->title = 'Users';
$this->breadcrumbs = array(
    $this->title
);
?>

<div class="col-lg-12 col-md-12">
    <div class="row mb10">
        <?php echo CHtml::link('<i class="fa fa-plus"></i>&nbsp;&nbsp;Create User', array('/admin/user/create'), array('class' => 'btn btn-success pull-right')); ?>
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
                'name' => 'email',
                'htmlOptions' => array('vAlign' => 'middle'),
                'type' => 'raw',
                'value' => 'CHtml::link(CHtml::encode($data->email), "mailto:".CHtml::encode($data->email))',
            ),
            array(
                'name' => 'role_search',
                'htmlOptions' => array('style' => 'width: 180px;', 'vAlign' => 'middle'),
                'type' => 'raw',
                'value' => 'CHtml::encode($data->roleMdl->Description)',
            ),
            array(
                'name' => 'status',
                'htmlOptions' => array('style' => 'width: 180px; text-align:center', 'vAlign' => 'middle'),
                'type' => 'raw',
                'value' => function($data) {
                    echo ($data->status == 1) ? "<i class='fa fa-circle text-green'></i>" : "<i class='fa fa-circle text-red'></i>";
                },
                'filter' => array(0 => 'In-Active', 1 => 'Active')
            ),
            array(
                'header' => 'Actions',
                'class' => 'booster.widgets.TbButtonColumn',
                'htmlOptions' => array('style' => 'width: 180px; text-align:center', 'vAlign' => 'middle', 'class' => 'action_column'),
                'template' => '{view}{update}{delete}',
                'buttons' => array(
                ),
            )
        );

        $this->widget('booster.widgets.TbExtendedGridView', array(
            'filter' => $searchModel,
            'type' => 'striped bordered',
            'dataProvider' => $searchModel->search(),
            'responsiveTable' => true,
            'template' => "<div class='panel panel-primary'><div class='panel-heading'><div class='pull-right'>{summary}</div><h3 class='panel-title'><i class='glyphicon glyphicon-book'></i>  Users </h3></div>\n<div class='panel-body'>{items}\n{pager}</div></div>",
            'columns' => $gridColumns
                )
        );
        ?>
    </div>
</div>