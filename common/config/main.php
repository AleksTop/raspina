<?php
$language = 'fa-IR';
$calendar = 'persian';
//$language = 'en-US';
$timeZone = 'Asia/Tehran';

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => $language,
    'timeZone' => $timeZone,
    'components' => [
        'assetManager' => [
//            'linkAssets' => true,
//            'forceCopy' => true,
        ],
        'view' => [
            'class' => 'yii\web\View',
            'renderers' => [
//                'twig' => [
//                    'cachePath' => false,
//                    'class' => 'yii\twig\ViewRenderer',
//                    'options' => YII_DEBUG ? [
//                        'debug' => true,
//                        'auto_reload' => true,
//                    ] : [],
//                    'extensions' => YII_DEBUG ? [
//                        '\Twig_Extension_Debug',
//                    ] : [],
//                    'globals' => [
//                        'html' => '\yii\helpers\Html',
//                    ],
//                    'functions' => array(
//                        'pdate' => 'Yii::$app->date->pdate',
//                        'Captcha_className' => '\yii\captcha\Captcha::className',
//                    ),
//                ]
            ],
        ],
        
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
          'class' => 'yii\rbac\DbManager'
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages'
                ],
            ],
        ],
        'hashids' => [
            'class' => 'light\hashids\Hashids',
            'salt' => '$atj@.14e*B4',
            'minHashLength' => 5,
            //'alphabet' => 'abcdefghigk'
        ],
        'date' => [
            'class' => 'yii\i18n\Formatter',
            'locale' => 'en-US@calendar=persian',
            'calendar' => \IntlDateFormatter::TRADITIONAL,
            'dateFormat' => 'php:Y-m-d',
            'datetimeFormat' => 'php:Y-m-d H:i',
            'timeFormat' => 'php:H:i',
        ],
        'browser' => [
            'class' => 'common\components\browser',
        ],
        'setting' => [
            'class' => 'common\components\setting',
        ],
        'render' => [
            'class' => 'common\components\render',
        ],
    ],
    'aliases' => [
        '@user_avatar' => '@common/files/avatar',
        '@file_upload' => '@common/files/upload',
        '@template' => 'template',
        '@templateUrl' => 'frontend/views/template'
    ]
];
