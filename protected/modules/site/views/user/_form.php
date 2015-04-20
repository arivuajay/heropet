<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>
<div class="container">

    <div class="row">
        <div class="col-md-12">

            <div class="row featured-boxes login">
                <div class="col-sm-12">
                    <div class="featured-box featured-box-secundary default info-content">
                        <div class="box-content">
                            <h4>Sign Up with</h4>
                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'user-form',
                                'htmlOptions' => array(
                                    'enctype' => 'multipart/form-data',
                                    'class' => 'form-horizontal form-bordered'
                                ),
                                'clientOptions' => array(
                                    'validateOnSubmit' => true,
                                ),
                                'enableAjaxValidation' => true,
                            ));

                            $user_title = array('Mr' => 'Mr', 'Ms' => 'Ms');
                            $countries_list = CHtml::listData(Country::model()->findAll(), 'country_id', 'country_name');
                            ?>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-sm-4 col-md-5 social-signup">
                                            <button type="button" data-provider="facebook" class="btn label-primary oAuthLogin">
                                                Connect with Facebook &nbsp;<i class="fa fa-facebook"></i>
                                            </button>
                                        </div>
                                        <div class="col-sm-4 col-md-5 social-signup">
                                            <button type="button" data-provider="google" class="btn label-danger oAuthLogin">
                                                Connect with Google+ &nbsp;<i class="fa fa-google-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12"><h4>Register an account</h4> </div>
                                <?php echo $form->labelEx($user_profile, 'user_title', array("class" => "col-sm-3 col-md-2 control-label")); ?>
                                <div class="col-sm-6 col-md-6">
                                    <?php echo $form->dropDownList($user_profile, 'user_title', $user_title, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($user_profile, 'user_title'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo $form->labelEx($user_profile, 'user_first_name', array("class" => "col-sm-3 col-md-2 control-label")); ?>
                                <div class="col-sm-6 col-md-6">
                                    <?php echo $form->textField($user_profile, 'user_first_name', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($user_profile, 'user_first_name'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo $form->labelEx($user_profile, 'user_sur_name', array("class" => "col-sm-3 col-md-2 control-label")); ?>
                                <div class="col-sm-6 col-md-6">
                                    <?php echo $form->textField($user_profile, 'user_sur_name', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($user_profile, 'user_sur_name'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo $form->labelEx($user_profile, 'pet_country_id', array("class" => "col-sm-3 col-md-2 control-label")); ?>
                                <div class="col-sm-6 col-md-6">
                                    <?php echo $form->dropDownList($user_profile, 'pet_country_id', $countries_list, array('class' => 'form-control')); ?>
                                    <?php echo $form->error($user_profile, 'pet_country_id'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo $form->labelEx($user_profile, 'user_zip_code', array("class" => "col-sm-3 col-md-2 control-label")); ?>
                                <div class="col-sm-6 col-md-6">
                                    <?php echo $form->textField($user_profile, 'user_zip_code', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($user_profile, 'user_zip_code'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo $form->labelEx($user_profile, 'user_town', array("class" => "col-sm-3 col-md-2 control-label")); ?>
                                <div class="col-sm-6 col-md-6">
                                    <?php echo $form->textField($user_profile, 'user_town', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($user_profile, 'user_town'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo $form->labelEx($user_profile, 'user_street', array("class" => "col-sm-3 col-md-2 control-label")); ?>
                                <div class="col-sm-6 col-md-6">
                                    <?php echo $form->textField($user_profile, 'user_street', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($user_profile, 'user_street'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo $form->labelEx($user_profile, 'user_house_number', array("class" => "col-sm-3 col-md-2 control-label")); ?>
                                <div class="col-sm-6 col-md-6">
                                    <?php echo $form->textField($user_profile, 'user_house_number', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($user_profile, 'user_house_number'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo $form->labelEx($user_profile, 'user_mobile_number', array("class" => "col-sm-3 col-md-2 control-label")); ?>
                                <div class="col-sm-6 col-md-6">
                                    <?php echo $form->textField($user_profile, 'user_mobile_number', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($user_profile, 'user_mobile_number'); ?>
                                </div>
                            </div>

<!--                            <div class="form-group">
                                <label class="col-sm-3 control-label">Price: </label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <input class="form-control" name="Price" value="" type="text">
                                        <select class="selectpicker" id="currency" name="currency">
                                            <option>option1</option>
                                            <option>option2</option>
                                            <option>option3</option>
                                            <option>option4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>-->

                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'user_email', array("class" => "col-sm-3 col-md-2 control-label")); ?>
                                <div class="col-sm-6 col-md-6">
                                    <?php echo $form->textField($model, 'user_email', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'user_email'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'user_repeat_email', array("class" => "col-sm-3 col-md-2 control-label")); ?>
                                <div class="col-sm-6 col-md-6">
                                    <?php echo $form->textField($model, 'user_repeat_email', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'user_repeat_email'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'user_password', array("class" => "col-sm-3 col-md-2 control-label")); ?>
                                <div class="col-sm-6 col-md-6">
                                    <?php echo $form->passwordField($model, 'user_password', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'user_password'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'user_repeat_password', array("class" => "col-sm-3 col-md-2 control-label")); ?>
                                <div class="col-sm-6 col-md-6">
                                    <?php echo $form->passwordField($model, 'user_repeat_password', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'user_repeat_password'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo $form->labelEx($user_profile, 'user_voucher_code', array("class" => "col-sm-3 col-md-2 control-label")); ?>
                                <div class="col-sm-6 col-md-6">
                                    <?php echo $form->textField($user_profile, 'user_voucher_code', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($user_profile, 'user_voucher_code'); ?>
                                </div>
                            </div>

                            <?php if (CCaptcha::checkRequirements()): ?>
                                <div class="form-group">
                                    <?php echo $form->labelEx($user_profile, 'verifyCode', array("class" => "col-sm-3 col-md-2 control-label")); ?>
                                    <div class="col-sm-6 col-md-6">
                                        <?php $this->widget('CCaptcha'); ?><br>
                                        <?php echo $form->textField($user_profile, 'verifyCode'); ?>
                                        <?php echo $form->error($user_profile, 'verifyCode'); ?>
                                    </div>

                                </div>
                            <?php endif; ?>

                            <div class="form-group">
                                <div class="col-sm-3 col-md-2"></div>
                                <div class="col-md-9">
                                    <?php echo $form->checkBox($user_profile, 'user_is_agree_tc'); ?>
                                    I agree with the Terms and Conditions
                                    <?php echo $form->error($user_profile, 'user_is_agree_tc'); ?>
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-sm-3 col-md-2"></div>
                                <div class="col-md-9">
                                    <?php echo CHtml::submitButton('Register', array('class' => 'btn label-primary push-bottom')); ?>
                                </div>
                            </div>
                            <?php $this->endWidget(); ?>
                        </div>
                    </div>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('.oAuthLogin').click(function(e) {
                                var _frameUrl = "<?php echo Yii::app()->createAbsoluteUrl('/site/user/socialLoginProvider'); ?>?provider=" + $(this).data('provider');
                                window.open(_frameUrl, "SignIn", "width=580,height=410,toolbar=0,scrollbars=0,status=0,resizable=0,location=0,menuBar=0,left=400,top=150");
                                e.preventDefault();
                                return false;
                            });
                        });
                    </script>

                </div>
            </div>

        </div>
    </div>
</div>