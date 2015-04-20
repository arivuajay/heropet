<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */

$this->title = 'User Profile';
$this->breadcrumbs = array(
    $this->title,
);
?>

<div class="container">

    <div class="row">
        <div class="col-md-12">

            <div class="row featured-boxes login">
                <div class="col-sm-12">
                    <div class="featured-box featured-box-secundary default info-content">
                        <div class="box-content">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <h3> Welcome To Hero Pet. </h3></br>
                                    <?php echo CHtml::link('Logout', array('/site/user/logout')); ?>      
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>