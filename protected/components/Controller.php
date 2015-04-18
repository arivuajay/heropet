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
    protected $adminHomeUrl = array('/admin/default/index');
    protected $userHomeUrl = array('/site/default/index');
    protected $siteHomeUrl = array('/');

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
        $this->flashMessages = Yii::app()->user->getFlashes();
        $this->themeUrl = Yii::app()->theme->baseUrl;
    }

    public function goAdminHome() {
        $this->redirect($this->adminHomeUrl);
    }

    public function goUserHome() {
        $this->redirect($this->userHomeUrl);
    }
    
    public function goSiteHome(){
        $this->redirect($this->siteHomeUrl);
    }

    public function allowAdminRole() {
        if (isset(Yii::app()->user->role) && in_array(Yii::app()->user->role, array('admin'))) {
            return true;
        } else {
            return false;
        }
    }

}
