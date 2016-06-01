<?php

// Define a path alias for the Bootstrap extension as it's used internally.
// In this example we assume that you unzipped the extension under protected/extensions.
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

$mydominio="http://www.laburator.com/";
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

///// INICIAR VARIABLES DE BBDD
$OPENSHIFT_MYSQL_DB_HOST=(getenv('OPENSHIFT_MYSQL_DB_HOST')!="")? getenv('OPENSHIFT_MYSQL_DB_HOST'):'localhost';
$OPENSHIFT_MYSQL_DB_PORT=(getenv('OPENSHIFT_MYSQL_DB_PORT')!="")? getenv('OPENSHIFT_MYSQL_DB_PORT'):'3306';
$OPENSHIFT_MYSQL_DB_USERNAME=(getenv('OPENSHIFT_MYSQL_DB_USERNAME')!="")? getenv('OPENSHIFT_MYSQL_DB_USERNAME'):'admin9VnNBsw';
$OPENSHIFT_MYSQL_DB_PASSWORD=(getenv('OPENSHIFT_MYSQL_DB_PASSWORD')!="")? getenv('OPENSHIFT_MYSQL_DB_PASSWORD'):'8TIPXnt7N9KL';
		
		
return array(
    'timeZone' => 'Europe/Madrid',
    'theme'=>'bootstrap', // requires you to copy the theme under your themes directory
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Laburator',
        'sourceLanguage'=>'xx',
	'language'=>'en',
	// preloading 'log' component
	'preload' => array(
		 'log',
		// preloading 'loginReturnUrlTracker' component to track the current return url that users should be redirected to after login
		'loginReturnUrlTracker',
		'bootstrap'
	),
	'aliases' => array(
       'bootstrap' => 'ext.bootstrap',
	   'yiiExtensions' => 'application.protected.extensions',
	   'booster'=> 'application.extensions.yiibooster',
	   'yiibooster'=> 'application.extensions.yiibooster',
    ),
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
        'application.components.*',
        'application.modules.user.models.*',
        'application.modules.user.components.*',
		'application.widgets.bootstrap.*',
		'application.extensions.crontab.*',
		'bootstrap.behaviors.*',
		'bootstrap.helpers.*',
		'bootstrap.widgets.*',
		'ext.giix-components.*', // giix components
		'application.extensions.yiidebugtb.*', //our extension
		'yiibooster.*',
		
		
	),

	'modules'=>array(

		// uncomment the following to enable the Gii tool
		/**/
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'angela',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths'=>array(
            'bootstrap.gii',
			'ext.giix-core', // giix generators
                          ),
		),
		'user' => array(
                        'tableUsers' => 'tbl_users',
                        'tableProfiles' => 'tbl_profiles',
                        'tableProfileFields' => 'tbl_profiles_fields',
			'returnUrl' =>  $mydominio,
                 ),
                'ajax',
	),
     
	// application components
	'components'=>array(
		'clientScript' => array(
		   'class' => 'application.components.yii-EClientScript.EClientScript',
		   'combineScriptFiles' => !YII_DEBUG, // By default this is set to true, set this to true if you'd like to combine the script files
		   'combineCssFiles' => !YII_DEBUG, // By default this is set to true, set this to true if you'd like to combine the css files
		   'optimizeScriptFiles' => !YII_DEBUG, // @since: 1.1
		   'optimizeCssFiles' => !YII_DEBUG, // @since: 1.1
		   'optimizeInlineScript' => false, // @since: 1.6, This may case response slower
		   'optimizeInlineCss' => false, // @since: 1.6, This may case response slower
		 ),
		 
		'mobileDetect' => array(
			'class' => 'ext.MobileDetect.MobileDetect'
		),
		 'sitemap' => array(
			'class' => 'yiiExtensions\sitemap\SitemapComponent',
		),	 
		'bootstrap' => array(
			//'class' => 'bootstrap.components.BsApi'
			'class' => 'booster.components.Booster',

		),
		/* 
		'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),*/
		'advancedFilters'=>array(
			'class'=>'ext.advancedFilters.AdvancedFilters',
		),   
		'loginReturnUrlTracker' => array(
			'class' => 'application.components.LoginReturnUrlTracker',
		),
		'user'=>array(
                        // enable cookie-based authentication
                        'allowAutoLogin'=>true,
                        'loginUrl' => array('/login'),
						'returnUrl' => $mydominio,
                ),
		// uncomment the following to enable URLs in path-format
		/**/
		'urlManager'=>array(
			//ELangUrlManager configuration
            /*
				'class'=>'ELangUrlManager',
				'languages'=>array('es'=>'Spanish','en'=>'English'), //assoziative array language => label
				'cookieDays'=>10, //keep language 10 days
			*/
			//MaavELangUrlManager configuration (FUNCIONA)
			/*  */	
   			    'class'=>'MaavELangUrlManager',
				'languages'=>array('es'=>'Spanish','en'=>'English'), //assoziative array language => label
				'cookieDays'=>10, //keep language 10 days
			
			'urlFormat'=>'path',
			'showScriptName' => false,
			'rules'=>array(
                                'ir/a/trabajo/<ciudad>/<nombreoferta>/<elid>/<idd>/<id:\d+>' => array('/ofertaTrabajo/view', 'defaultParams'=>array('lang'=>'es','goto'=>true)),	
                                'ir/a/trabajar/<ciudad>/<nombreoferta>/<elid>/<idd>/<id:\d+>' => array('/ofertaTrabajo/view', 'defaultParams'=>array('lang'=>'es','goto'=>true)),	
                                'ajax/<accion>/<id:\d+>' => array('/ajax', 'defaultParams'=>array('lang'=>'es')),
								'login/lang/<lang>'=>array('/user/login'),
                                ////// English
                                '<nombreusuario>/<profesion>/profile/<id:\d+>' => array('/user/profile', 'defaultParams'=>array('lang'=>'en')),
                                '<nombreusuario>/profile/<id:\d+>' => array('/profile', 'defaultParams'=>array('lang'=>'en')),
                                '<nombreusuario>/profile/<id:\d+>/lang/<idioma>' => array('/profile', 'defaultParams'=>array('lang'=>'<idioma>')),
                                'jobs/<ciudad>/<nombreoferta>/<id:\d+>' => array('/ofertaTrabajo/view', 'defaultParams'=>array('lang'=>'en')),
								'job/<ciudad>/<nombreoferta>/<id:\d+>' => array('/ofertaTrabajo/view', 'defaultParams'=>array('lang'=>'en')),
								'employee/<ciudad>/<nombreoferta>/<id:\d+>' => array('/ofertaTrabajo/view', 'defaultParams'=>array('lang'=>'en')),
												'jobs'=>array('/ofertaTrabajo', 'defaultParams'=>array('lang'=>'en')),
								'contact'=>array('/', 'defaultParams'=>array('lang'=>'en')),
								'about'=>array('/', 'defaultParams'=>array('lang'=>'en')),
								'queen'=>array('/reina', 'defaultParams'=>array('lang'=>'en')),
								'search-job'=>array('/search', 'defaultParams'=>array('lang'=>'en')),
								'sign-up'=>array('/user/registration', 'defaultParams'=>array('lang'=>'en')),
								'login'=>array('/user/login', 'defaultParams'=>array('lang'=>'en')),
											  
								////// Español
								'trabajar/<ciudad>/<nombreoferta>/<id:\d+>' => array('/ofertaTrabajo/view', 'defaultParams'=>array('lang'=>'es')),
								'trabajo/<ciudad>/<nombreoferta>/<id:\d+>' => array('/ofertaTrabajo/view', 'defaultParams'=>array('lang'=>'es')),
								 'site/trabajar/<ciudad>/<nombreoferta>/<id:\d+>' => array('/ofertaTrabajo/view', 'defaultParams'=>array('lang'=>'es')),
								'site/trabajo/<ciudad>/<nombreoferta>/<id:\d+>' => array('/ofertaTrabajo/view', 'defaultParams'=>array('lang'=>'es')),
											   
												'trabajos'=>array('/ofertaTrabajo', 'defaultParams'=>array('lang'=>'es')),
								'contacto'=>array('/', 'defaultParams'=>array('lang'=>'es')),
												'sobre-nosotros'=>array('/', 'defaultParams'=>array('lang'=>'es')),
								'buscar-trabajo'=>array('/search', 'defaultParams'=>array('lang'=>'es')),
												'buscar-trabajo'=>array('/search/index', 'defaultParams'=>array('lang'=>'es')),
								'registrarte'=>array('/user/registration', 'defaultParams'=>array('lang'=>'es')),
								'entrar'=>array('/user/login', 'defaultParams'=>array('lang'=>'es')),
								//'reina'=>array('/reina', 'defaultParams'=>array('lang'=>'es')),
								/////  Mobile
                                'mode1'=>array('/search', 'defaultParams'=>array('m'=>'true','vertodo'=>'true')),
								'mode2'=>array('/favSearch', 'defaultParams'=>array('m'=>'true','vertodo'=>'true')),
								'mode3'=>array('/user/profile', 'defaultParams'=>array('m'=>'true','vertodo'=>'true')),
								'mode4'=>array('/search', 'defaultParams'=>array('m'=>'true','vertodo'=>'true')),
                                'modo1'=>array('/search', 'defaultParams'=>array('m'=>'true','vertodo'=>'true')),
								'modo2'=>array('/favSearch', 'defaultParams'=>array('m'=>'true','vertodo'=>'true')),
								'modo3'=>array('/user/profile', 'defaultParams'=>array('m'=>'true','vertodo'=>'true')),
								'modo4'=>array('/search', 'defaultParams'=>array('m'=>'true','vertodo'=>'true')),
				
                                '<action:(auth)>' => 'site/<action:\w+>',
                                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
								'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
								'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				
				

			),
		),
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database  127.9.76.130:53e121535973ca37fb000149@main-lbt1.rhcloud.com=www.laburator.com, 127.9.76.129=trabajar.laburator.com
		*/
		'db'=>array(
			'connectionString' => 'mysql:host='.$OPENSHIFT_MYSQL_DB_HOST.';port='.$OPENSHIFT_MYSQL_DB_PORT.';dbname=laburatordb',
			'emulatePrepare' => true,
			'username' => $OPENSHIFT_MYSQL_DB_USERNAME,
			'password' => $OPENSHIFT_MYSQL_DB_PASSWORD,
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning, trace',
				),
				// uncomment the following to show log messages on web pages
				/**/
				array(
					//'class'=>'CWebLogRoute',
					'class'=>'XWebDebugRouter',
					'config'=>'alignLeft, opaque, runInDebug, fixedPos, collapsed, yamlStyle',
					'levels'=>'error, warning, trace, profile, info',
					'allowedIPs'=>array('127.0.0.1','::1','192.168.1.54','192\.168\.1[0-5]\.[0-9]{3}'),
				),
				
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'mcvela@gmail.com',
	),
);