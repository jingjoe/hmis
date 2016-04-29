<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'timeZone' => 'Asia/Bangkok',
    'language'=>'th',
    'controllerNamespace' => 'frontend\controllers',
      'modules' => [
        'reportonline' => [
            'class' => 'frontend\modules\reportonline\Module',
        ],
        'rm' => [
            'class' => 'frontend\modules\rm\Module',
        ],
        'right' => [
            'class' => 'frontend\modules\right\Module',
        ],
        'oppp' => [
            'class' => 'frontend\modules\oppp\Module',
        ],
        'qof' => [
            'class' => 'frontend\modules\qof\Module',
        ],
        'sqlscript' => [
            'class' => 'frontend\modules\sqlscript\Module',
        ],
        'workmember' => [
            'class' => 'frontend\modules\workmember\Module',
        ],
        'hosxpwarning' => [
            'class' => 'frontend\modules\hosxpwarning\Module',
        ],
        'reporthosxp' => [
            'class' => 'frontend\modules\reporthosxp\Module',
        ],
        'labstore' => [
            'class' => 'frontend\modules\labstore\Module',
        ],
    ],
    'components' => [
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
        'urlManagerBackend' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => '../../backend/web',
            'scriptUrl' => '../../backend/web/index.php',
            'enablePrettyUrl' => false,
            'showScriptName' => true,
        ],

        'thaiFormatter'=>[
        'class'=>'dixonsatit\thaiYearFormatter\ThaiYearFormatter',
        ]
    ],
    'params' => $params,
];
