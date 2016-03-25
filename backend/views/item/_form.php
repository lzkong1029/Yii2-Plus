<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-form col-sm-4">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type' )->dropDownList(['1' =>'角色' ,'2' =>'权限' ])?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?/*= $form->field($model, 'rule_name')->textInput(['maxlength' => true]) */?><!--

    <?/*= $form->field($model, 'data')->textarea(['rows' => 6]) */?>

    <?/*= $form->field($model, 'created_at')->textInput() */?>

    --><?/*= $form->field($model, 'updated_at')->textInput() */?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
