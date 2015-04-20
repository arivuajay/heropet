<!DOCTYPE html>
<html>
    <head>
        <!-- Basic -->
        <meta charset="utf-8">
        <title><?php echo Yii::app()->name; ?></title>		
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php
        $themeUrl = $this->themeUrl;
        $cs = Yii::app()->getClientScript();
        ?>

        <!-- Web Fonts  -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

        <?php
        $cs->registerCssFile($themeUrl . '/vendor/bootstrap/bootstrap.css');
        $cs->registerCssFile($themeUrl . '/vendor/fontawesome/css/font-awesome.css');
        $cs->registerCssFile($themeUrl . '/css/theme.css');
        $cs->registerCssFile($themeUrl . '/css/theme-elements.css');
        $cs->registerCssFile($themeUrl . '/css/skins/default.css');
        $cs->registerCssFile($themeUrl . '/css/polyglot-language-switcher.css');
        $cs->registerCssFile($themeUrl . '/css/custom.css');
        ?>
        
        <!--[if IE]>
            <link rel="stylesheet" href="<?php echo $themeUrl; ?>/css/ie.css">
        <![endif]-->

        <!--[if lte IE 8]>
            <script src="<?php echo $themeUrl; ?>/vendor/respond/respond.js"></script>
            <script src="<?php echo $themeUrl; ?>/vendor/excanvas/excanvas.js"></script>
        <![endif]-->

        <?php
//        $cs->registerCssFile($themeUrl . '/css/custom.css');
//        $cs->registerScriptFile($themeUrl . '/vendor/modernizr/modernizr.js');
//        $cs->registerCssFile($themeUrl . '/vendor/owlcarousel/owl.carousel.min.css', 'screen');
//        $cs->registerCssFile($themeUrl . '/vendor/owlcarousel/owl.theme.default.min.css', 'screen');
//        $cs->registerCssFile($themeUrl . '/vendor/magnific-popup/magnific-popup.css', 'screen');
//        $cs->registerCssFile($themeUrl . '/css/theme-blog.css');
//        $cs->registerCssFile($themeUrl . '/css/theme-shop.css');
//        $cs->registerCssFile($themeUrl . '/css/theme-animate.css');
//        $cs->registerCssFile($themeUrl . '/vendor/rs-plugin/css/settings.css', 'screen');
//        $cs->registerCssFile($themeUrl . '/vendor/circle-flip-slideshow/css/component.css', 'screen');
        ?>
    </head>
    <body>
        <div class="body">
            <?php $this->renderPartial('//layouts/_header'); ?>

            <?php echo $content; ?>

            <?php $this->renderPartial('//layouts/_footer'); ?>
        </div>

        <?php
        $cs_pos_end = CClientScript::POS_END;

        $cs->registerCoreScript('jquery');

        $cs->registerScriptFile($themeUrl . '/js/jquery.cookie.js', $cs_pos_end);
        $cs->registerScriptFile($themeUrl . '/vendor/bootstrap/bootstrap.js', $cs_pos_end);
        $cs->registerScriptFile($themeUrl . '/vendor/common/common.js', $cs_pos_end);
        $cs->registerScriptFile($themeUrl . '/js/theme.js', $cs_pos_end);
        $cs->registerScriptFile($themeUrl . '/js/custom.js', $cs_pos_end);
        $cs->registerScriptFile($themeUrl . '/js/theme.init.js', $cs_pos_end);

        $cs->registerCssFile($themeUrl . '/jqtransform.css');
        $cs->registerScriptFile($themeUrl . '/jquery.jqtransform.js', $cs_pos_end);
        $cs->registerScriptFile($themeUrl . '/js/jquery.polyglot.language.switcher.js', $cs_pos_end);

        $cs->registerScript('jqtransform-script', <<<EOD
            $(function() {
                $('form.jqtransform').jqTransform({imgPath: 'jqtransformplugin/img/'});
            });
                
            function initialize() {
                   var input = document.getElementById('searchTextField');
                   var autocomplete = new google.maps.places.Autocomplete(input);
            }
           google.maps.event.addDomListener(window, 'load', initialize);
EOD
        );
        ?>
        
        <script type="text/javascript">
            $(document).ready(function() {
                $('#polyglotLanguageSwitcher').polyglotLanguageSwitcher({
                    effect: 'fade',
                    testMode: true,
                    onChange: function(evt) {
                        alert("The selected language is: " + evt.selectedItem);
                    }

                });
            });
        </script>

        <?php
//        $cs->registerScriptFile($themeUrl . '/vendor/jquery/jquery.js', $cs_pos_end);
//        $cs->registerScriptFile($themeUrl . '/vendor/jquery.appear/jquery.appear.js', $cs_pos_end);
//        $cs->registerScriptFile($themeUrl . '/vendor/jquery.easing/jquery.easing.js', $cs_pos_end);
//        $cs->registerScriptFile($themeUrl . '/vendor/jquery-cookie/jquery-cookie.js', $cs_pos_end);
//        $cs->registerScriptFile($themeUrl . '/vendor/jquery.validation/jquery.validation.js', $cs_pos_end);
//        $cs->registerScriptFile($themeUrl . '/vendor/jquery.stellar/jquery.stellar.js', $cs_pos_end);
//        $cs->registerScriptFile($themeUrl . '/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js', $cs_pos_end);
//        $cs->registerScriptFile($themeUrl . '/vendor/jquery.gmap/jquery.gmap.js', $cs_pos_end);
//        $cs->registerScriptFile($themeUrl . '/vendor/isotope/jquery.isotope.js', $cs_pos_end);
//        $cs->registerScriptFile($themeUrl . '/vendor/owlcarousel/owl.carousel.js', $cs_pos_end);
//        $cs->registerScriptFile($themeUrl . '/vendor/jflickrfeed/jflickrfeed.js', $cs_pos_end);
//        $cs->registerScriptFile($themeUrl . '/vendor/magnific-popup/jquery.magnific-popup.js', $cs_pos_end);
//        $cs->registerScriptFile($themeUrl . '/vendor/vide/vide.js', $cs_pos_end);
//        $cs->registerScriptFile($themeUrl . '/vendor/rs-plugin/js/jquery.themepunch.tools.min.js', $cs_pos_end);
//        $cs->registerScriptFile($themeUrl . '/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js', $cs_pos_end);
//        $cs->registerScriptFile($themeUrl . '/vendor/circle-flip-slideshow/js/jquery.flipshow.js', $cs_pos_end);
//        $cs->registerScriptFile($themeUrl . '/js/views/view.home.js', $cs_pos_end);
        ?>
    </body>
</html>