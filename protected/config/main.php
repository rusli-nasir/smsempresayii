<?php// uncomment the following to define a path alias// Yii::setPathOfAlias('local','path/to/local-folder');// This is the main Web application configuration. Any writable// CWebApplication properties can be configured here.return array(    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',    'name' => 'SMS Empresa',    // preloading 'log' component    'preload' => array('log'),    // autoloading model and component classes    'import' => array(        'application.models.*',        'application.components.*',        'application.modules.user.models.*',        'ext.gtc.components.*', // Gii Template Collection    ),    'modules' => array(        'importcsv' => array(            'path' => 'upload/importcsv/', // path to folder for saving csv file and file with import params        ),        // uncomment the following to enable the Gii tool        'gii' => array(            'class' => 'system.gii.GiiModule',            'generatorPaths' => array(                'ext.gtc', //application.gii a path alias            ),            'password' => 'sms2011',            // If removed, Gii defaults to localhost only. Edit carefully to taste.            'ipFilters' => array('190.181.*.*', '127.0.0.1', '::1'),        ),    ),    'language' => 'es',    'charset' => 'utf-8',    'timeZone'=>'America/Managua',    // application components    'components' => array(        'user' => array(            // enable cookie-based authentication            'allowAutoLogin' => true,        ),        'messages' => array(            'class' => 'CPhpMessageSource',        ),        // uncomment the following to enable URLs in path-format        'urlManager' => array(            'urlFormat' => 'path',            'rules' => array(                'gii' => 'gii',                'gii/<controller:\w+>' => 'gii/<controller>',                'gii/<controller:\w+>/<action:\w+>' => 'gii/<controller>/<action>',                '<controller:\w+>/<id:\d+>' => '<controller>/view',                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',            ),        ),        /*          'db'=>array(          'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',          ), */        // uncomment the following to use a MySQL database        /*'db' => array(            'connectionString' => 'mysql:host=localhost;dbname=logicani_smsempresa',            'emulatePrepare' => true,            'username' => 'logicani_smsemp',            'password' => 'smsempresa2011!',            'charset' => 'utf8',            'tablePrefix' => 'movistar_'        ),*/        'db' => array(            'connectionString' => 'mysql:host=localhost;dbname=sms_nicaragua',            'emulatePrepare' => true,            'username' => 'smsnicaragua',            'password' => 'sms2011',            'charset' => 'utf8',            'tablePrefix' => 'movistar_'        ),        'errorHandler' => array(            // use 'site/error' action to display errors            'errorAction' => 'site/error',        ),        'log' => array(            'class' => 'CLogRouter',            'routes' => array(                array(                    'class' => 'CFileLogRoute',                    'levels' => 'error, warning',                ),            // uncomment the following to show log messages on web pages            /*              array(              'class'=>'CWebLogRoute',              ),             */            ),        ),    ),    // application-level parameters that can be accessed    // using Yii::app()->params['paramName']    'params' => array(        // this is used in contact page        'adminEmail' => 'logicoim@gmail.com',    ),);