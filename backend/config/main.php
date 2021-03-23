<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);  

return [
    'id' => 'systemx-core',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'defaultRoute' => 'dashboard/default',
    'bootstrap' => ['log'],
    'timeZone' => 'Asia/Jakarta',
    'modules' => [
        'admin' => [
            'class' => 'backend\modules\admin\Admin',
        ],
        
        'schl' => [
            'class' => 'backend\modules\schl\Schl',
        ],
          
    ],
    'components' => [
        'uiHelper' => [
            /*class ui helper harus meng-implements abstrack backend/themes/UiHelperAbstract*/
            'class' => 'backend\themes\v2\helpers\UiHelper',
        ],

        //showScriptName and url rules, overwritten in main-local.php
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => true,
        ],
        
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['user/login'],
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@app/themes/v2',
                ],
            ],
        ],
        'messenger' => [
            'class' => 'common\components\Messenger',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
