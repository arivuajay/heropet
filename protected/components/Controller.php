<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();
    protected $homeUrl = array('/admin/default/index');

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();
    public $flashMessages = array();
    public $themeUrl = '';
    public $title = '';

    public function init() {
        CHtml::$errorSummaryCss = 'alert alert-danger';

        $this->flashMessages = Yii::app()->user->getFlashes();
        $this->themeUrl = Yii::app()->theme->baseUrl;

        if (!isset($_COOKIE['hpet_geo_loc']))
            $this->setIPLocation();

        if (@$_COOKIE['hpet_geo_loc'] != 'true')
            $this->setGeoLocation();

        parent::init();
    }

    public function goHome() {
        $this->redirect($this->homeUrl);
    }

    protected function setGeoLocation() {
        Yii::app()->getClientScript()->registerScript('geo-script', <<<EOD
                $(document).ready(function() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(showPosition);
                    } else {
                        alert("Geolocation is not supported by this browser.");
                    }
                });

                function showPosition(position) {
                    $.cookie("hpet_geo_lat", position.coords.latitude); 
                    $.cookie("hpet_geo_lng", position.coords.longitude); 
                    $.cookie("hpet_geo_loc", "true"); 
                    window.location.reload();
                }
EOD
        );
    }

    protected function setIPLocation() {
//        $ip = Yii::app()->request->getUserHostAddress();
        $ip = '122.174.91.122';
        $position = $this->getIPInfo($ip);
        setcookie('hpet_geo_lat', $position ['geoplugin_latitude']);
        setcookie('hpet_geo_lng', $position ['geoplugin_longitude']);
        setcookie('hpet_geo_loc', 'false');
        $this->refresh();
    }

    protected function getIPInfo($ip) {
        return unserialize(@file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $ip));
    }

}
