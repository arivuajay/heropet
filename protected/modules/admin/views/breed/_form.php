<?php
/* @var $this BreedController */
/* @var $model Breed */
/* @var $form CActiveForm */
?>

<div class="row">
    <div class="col-lg-12 col-xs-12">
        <div class="box box-primary">
            <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'breed-form',
        'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
	'enableAjaxValidation'=>true,
)); ?>
            <div class="box-body">
                                    <div class="form-group">
                        <?php echo $form->labelEx($model,'pet_category_id',  array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-5">
                        <?php
                        $categories = CHtml::listData(Category::model()->findAll('status=:status', array(
                                            ':status' => '1',
                                        )), 'category_id', 'category_name');
                        echo $form->dropDownList($model, 'pet_category_id', $categories, array('class' => 'form-control', 'prompt' => 'Select'));
                        ?>
                        <?php echo $form->error($model,'pet_category_id'); ?>
                        </div>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'breed_name',  array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-5">
                        <?php echo $form->textField($model,'breed_name',array('class'=>'form-control','size'=>60,'maxlength'=>256)); ?>
                        <?php echo $form->error($model,'breed_name'); ?>
                        </div>
                    </div>

<!--                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'created',  array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-5">
                        <?php echo $form->textField($model,'created',array('class'=>'form-control')); ?>
                        <?php echo $form->error($model,'created'); ?>
                        </div>
                    </div>

                                        <div class="form-group">
                        <?php echo $form->labelEx($model,'update',  array('class' => 'col-sm-2 control-label')); ?>
                        <div class="col-sm-5">
                        <?php echo $form->textField($model,'update',array('class'=>'form-control')); ?>
                        <?php echo $form->error($model,'update'); ?>
                        </div>
                    </div>-->

                                </div><!-- /.box-body -->
            <div class="box-footer">
                <div class="form-group">
                    <div class="col-sm-0 col-sm-offset-2">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
                    </div>
                </div>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div><!-- ./col -->
</div>