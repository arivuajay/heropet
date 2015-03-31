<?php $this->beginContent('//layouts/main'); ?>
<div role="main" class="main">
<?php if($this->breadcrumbs) { ?>
    <section class="page-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links' => $this->breadcrumbs,
                        'tagName' => 'ul', // container tag
                        'htmlOptions' => array('class' => 'breadcrumb'), // no attributes on container
                        'separator' => '', // no separator
                        'homeLink' => '<li><a href="' . Yii::app()->baseUrl . '/site/default/index">Home</a></li>', // home link template
                        'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>', // active link template
                        'inactiveLinkTemplate' => '<li class="active">{label}</li>', // in-active link template
                    ));
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>
                        <?php
                        if ($this->title !== null) {
                            echo Inflector::camel2words($this->title);
                        } else {
                            echo Inflector::camel2words(Inflector::id2camel($this->context->module->id));
                            echo ($this->context->module->id !== Yii::app()->id) ? '<small>Module</small>' : '';
                        }
                        ?>
                    </h1>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

    <?php if (isset($this->flashMessages) && !empty($this->flashMessages)):?>
        <div class="container">
            <?php foreach ($this->flashMessages as $key => $message) { ?>
                <div class="row">
                    <div class="alert alert-<?php echo $key; ?> fade in">
                        <?php echo $message; ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php endif ?>

    <?php echo $content; ?>
</div>
<?php $this->endContent(); ?>