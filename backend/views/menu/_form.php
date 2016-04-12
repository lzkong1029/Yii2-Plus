<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent' )->dropDownList($menuArr)?>

    <?= $form->field($model, 'route')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sort')->textInput()->label('排序') ?>

    <?= $form->field($model, 'status')->radioList(['1'=>'显示','0'=>'隐藏'])->label('显示')?>

    <?= $form->field($model, 'data')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
