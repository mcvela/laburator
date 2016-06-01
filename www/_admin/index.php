<?php    
define('YII_DIR', 'yii');
define('YII_PROTECTED', 'protected');

$yii=dirname(__FILE__).'/../../'.YII_DIR.'/framework/yii.php';	//Path to Yii distributive
$config=dirname(__FILE__).'/../'.YII_PROTECTED.'/config/autoadmin.local.php';	//Path to back-end config

require_once($yii);
Yii::createWebApplication($config)->run();
?>