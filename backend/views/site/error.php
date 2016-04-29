<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;
$this->title = $name;
?>

<div class="jumbotron">
      <h1><?=Html::img(Url::base().'/images/error.png')?><?= Html::encode($this->title) ?></h1>
      <p class="text-danger"><?= nl2br(Html::encode($message)." ".'กรุณาติดต่อผู้ดูแลระบบ !') ?></p>
</div>

