<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Menu */

$this->title = '创建菜单';
$this->params['breadcrumbs'][] = ['label' => 'Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wrapper wrapper-content">
<div class="ibox-content">
    <h1><?= Html::encode($this->title) ?></h1>
    <hr>
    <?= $this->render('_form', [
        'model' => $model,
        'menuArr' => $menuArr,
    ]) ?>

</div>
</div>
