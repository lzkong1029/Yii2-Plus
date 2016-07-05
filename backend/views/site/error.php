<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">
    <div style="margin-top: 100px;text-align: center;">
        <h1><?= Html::encode($this->title) ?></h1><br>
    </div>
    <h4 style="margin: 10px auto;text-align: center;background-color: #1ab394; color: #ffffff;width: 500px;height: 50px;line-height: 50px;border-radius: 5px;"><?= nl2br(Html::encode($message)) ?></h4>

</div>
