<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthItem */

$this->title = '更新角色 ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Auth Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wrapper wrapper-content ">
<div class="ibox-content">
    <div class="row pd-10">
    <h1><?= Html::encode($this->title) ?></h1>
    <hr>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>

</div>
</div>
