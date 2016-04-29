<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/images/favicon.ico" type="image/x-icon" />
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
         if (Yii::$app->user->isGuest) {
                $submenuItems[] = ['label' => 'เข้าสู่ระบบ', 'url' => ['/user/security/login']];
                
                $submenuItems[] = ['label' => 'ลงทะเบียนผู้ใช้งาน', 'url' => ['/user/registration/register']];
            } else {
                $submenuItems[] = [
                    'label' => 'กำหนดสิทธิ์ผู้ใช้งาน', 'url' => ['/admin'],
                ];
                $submenuItems[] = [
                    'label' => 'จัดการโพรไฟล์', 'url' => ['/user/settings/profile'],
                ];
                $submenuItems[] = [
                    'label' => 'ออกจากระบบ', 'url' => ['/user/security/logout'],'linkOptions' => ['data-method' => 'post']
                ];
            }
            
            $username = '';
            if (!Yii::$app->user->isGuest) {
                $username = '(' . Html::encode(Yii::$app->user->identity->username) . ')';
            }
            $menuItems = [
                ['label' => 'หน้าหลัก', 'url' => ['/site/index']],
                ['label' => 'ศูนย์ข้อมูลสาธารณสุข',
                   'items'=>[
                       ['label' => 'Data Center ระดับอำเภอ', 'url' => 'http://122.154.38.92/dhdc/frontend/web/index.php', 'linkOptions' => ['target' => '_blank'] ],   
                   ]
                ],
                ['label' => 'จัดการระบบ', 'url' => Yii::$app->urlManagerBackend->createUrl(['site/index'])],
                ['label' => 'ติดต่อ', 'url' => ['/site/contact']],
                ['label' => 'ผู้ใช้งาน' . " ".$username,
                 'items' => $submenuItems
                ],
            ];

    
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">Copyright &copy;  <?= date('Y') ?> Kohyao Chaipat Hospital</p>
        <p class="pull-right">Powered by <?= Html::a('Wichian Nunsri', ['site/about']) ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
