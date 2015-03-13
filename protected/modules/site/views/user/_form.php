<div class="row">
    <div class="col-lg-12 col-xs-12">
        <div class="box box-primary">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'profile-form',
                'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal'),
                'enableAjaxValidation' => true,
                'clientOptions'=>array(
                    'validateOnSubmit'=>true,
                )
            ));
            ?>
            <div class="box-body">
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'username', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'username', array('class'=>'form-control','size' => 60, 'maxlength' => 255)); ?>
                        <?php echo $form->error($model, 'username'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'name', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'name', array('class'=>'form-control','size' => 60, 'maxlength' => 255)); ?>
                        <?php echo $form->error($model, 'name'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'email', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php echo $form->textField($model, 'email', array('class'=>'form-control','size' => 60, 'maxlength' => 255)); ?>
                        <?php echo $form->error($model, 'email'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'role', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5">
                        <?php $roles = CHtml::listData(MasterRole::model()->findAll(), 'Master_Role_ID', 'Description'); ?>
                        <?php echo $form->dropDownList($model, 'role', $roles,array('class'=>'form-control')); ?>
                        <?php echo $form->error($model, 'role'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-5 statusfield">
                        <?php echo $form->checkBox($model, 'status',array('class'=>'form-control')); ?>
                    </div>
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <div class="form-group">
                    <div class="col-sm-0 col-sm-offset-2">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Update', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')); ?>
                    </div>
                </div>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div><!-- ./col -->
</div>