<?php

class SiteModule extends CWebModule {

    public function init() {
        Yii::app()->theme = 'site';
        $this->layoutPath = Yii::getPathOfAlias('webroot.themes.' . Yii::app()->theme->name . '.views.layouts');
        $this->layout = '//layouts/main';
    }

    public function beforeControllerAction($controller, $action) {
        if (parent::beforeControllerAction($controller, $action)) {
            // this method is called before any module controller action is performed
            // you may place customized code here
            if(Yii::app()->user->isGuest || Yii::app()->user->role != 1)
                return true;
            else
                Yii::app()->request->redirect(Yii::app()->createAbsoluteUrl("/").'/admin/default/login');
        } else
            return false;
    }

}
