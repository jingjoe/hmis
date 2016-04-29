<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'timeZone' => 'Asia/Bangkok',
    'components' => [
        'user' => [
            //'identityClass' => 'common\models\User',
            'identityClass' => 'dektrium\user\models\User',
            'enableAutoLogin' => true,
        ],
        'authManager' => [
           // 'class' =>  'yii\rbac\PhpManager',
            'class' =>  'yii\rbac\DbManager',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'modules' => [
        'user' => [
        'class' => 'dektrium\user\Module',
        'enableUnconfirmedLogin' => true,
        'confirmWithin' => 21600,
        'cost' => 12,
        'admins' => ['admin']
        ],

        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'top-menu',
            'menus' => [
                'assignment' => [
                    'label' => 'ให้สิทธิ์' // change label
                ]
            ],
            'controllerMap' => [
                 'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'userClassName' => 'dektrium\user\models\User',
                    //เรียกใช้โมเดล user ของ dektrium
                ]
            ],
        ],

        'gridview' => [
            'class' => '\kartik\grid\Module'
        ]
    ],
// หลังจาก config เรียบร้อยแล้วให้ปิด access site,admin
//    'as access' => [
//            'class' => 'mdm\admin\components\AccessControl',
//            'allowActions' => [
//            'site/*',
//            'admin/*',
//            'some-controller/some-action',
//
//            ]
//    ],
];
