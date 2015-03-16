<?php
/* @var $this MasterroleController */
/* @var $dataProvider CActiveDataProvider */

$this->title = 'Master Roles';
$this->breadcrumbs = array(
    'Master Roles',
);
?>

<div class="col-lg-12 col-md-12">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="glyphicon glyphicon-search"></i>  Search
                </h3>
                <div class="clearfix"></div>
            </div>
            <section class="content">
                <div class="row">
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'search-form',
                        'method' => 'get',
                        'action' => array('/site/masterrole/index'),
                        'htmlOptions' => array('role' => 'form')
                    ));
                    ?>
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Role_Code') ?>
                            <?php echo $form->textField($searchModel, 'Role_Code', array('autofocus', 'class' => 'form-control')); ?>
                            <?php echo $form->error($searchModel, 'Role_Code') ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Description') ?>
                            <?php echo $form->textField($searchModel, 'Description', array('autofocus', 'class' => 'form-control')); ?>
                            <?php echo $form->error($searchModel, 'Description') ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'Active') ?>
                            <?php echo $form->dropDownList($searchModel, 'Active', array('0' => 'In-active', '1' => 'Active'), array('prompt' => '', 'class' => 'form-control')); ?>
                            <?php echo $form->error($searchModel, 'Active') ?>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <?= CHtml::submitButton('Search', array('class' => 'btn btn-primary form-control')) ?>
                        </div>
                    </div>
                    <?php $this->endWidget(); ?>
                </div>
            </section>


        </div>
    </div>
</div>

<div class="col-lg-12 col-md-12">
    <div class="row mb10">
        <?php echo CHtml::link('<i class="fa fa-plus"></i>&nbsp;&nbsp;Create MasterRole', array('/site/masterrole/create'), array('class' => 'btn btn-success pull-right')); ?>
    </div>
</div>

<?php if($search){
    $result = $searchModel->search();
} else {
    $result = $model->dataProvider();
}
?>

<div class="col-lg-12 col-md-12">
    <div class="row">
        <?php
        $gridColumns = array(
            array(
                'class' => 'IndexColumn',
                'header' => '',
            ),
            'Role_Code',
            'Description',
            array(
                'name' => 'is_Admin',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle'),
                'type' => 'raw',
                'value' => function($data) {
                    echo ($data->is_Admin == 1) ? "<i class='fa fa-circle text-green'></i>" : "<i class='fa fa-circle text-red'></i>";
                },
            ),
            array(
                'name' => 'Active',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle'),
                'type' => 'raw',
                'value' => function($data) {
                    echo ($data->Active == 1) ? "<i class='fa fa-circle text-green'></i>" : "<i class='fa fa-circle text-red'></i>";
                },
            ),
            'Created_Date',
            'Rowversion',
            array(
                'header' => 'Actions',
                'class' => 'booster.widgets.TbButtonColumn',
                'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle', 'class' => 'action_column'),
                'template' => '{view}{update}{delete}',
                'buttons' => array(
//                    'privilages' => array(//the name {reply} must be same
//                        'label' => '<i class="fa fa-cogs"></i>',
//                        'options' => array(
//                            'title' => 'Privilages',
//                        ),
//                        'url' => 'CHtml::normalizeUrl(array("/site/authresources/role/rid/".rawurlencode($data->Master_Role_ID)))',
//                    ),
                ),
            )
        );

        $this->widget('booster.widgets.TbExtendedGridView', array(
            'type' => 'striped bordered',
            'dataProvider' => $result,
            'responsiveTable' => true,
            'template' => '<div class="panel panel-primary"><div class="panel-heading"><div class="pull-right">{summary}</div><h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  Master Roles</h3></div><div class="panel-body">{items}{pager}</div></div>',
            //'filter' => $model,
            'columns' => $gridColumns
                )
        );
        ?>
    </div>
</div>