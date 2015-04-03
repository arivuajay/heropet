<?php

error_reporting(E_ALL);
// change the following paths if necessary
$yii = dirname(__FILE__) . '/framework/yii.php';
$config = dirname(__FILE__) . '/protected/config/main.php';
include_once(dirname(__FILE__) . '/protected/config/constants.php');

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);

require_once($yii);
$app = Yii::createWebApplication($config);

$whitelist = array('127.0.0.1', '::1');
if (in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
    defined('IPADDRESS') ||
            @define('IPADDRESS', '122.174.91.122');
} else {
    defined('IPADDRESS') ||
            @define('IPADDRESS', Yii::app()->request->getUserHostAddress());
}

defined('SITEURL') ||
        @define('SITEURL', Yii::app()->createAbsoluteUrl("/"));
defined('SITENAME') ||
        @define('SITENAME', Yii::app()->name);

defined('DS') ||
        @define('DS', DIRECTORY_SEPARATOR);

$app->run();
