<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

<!--    <?/*= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) */?>

    --><?/*= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) */?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model1, 'name' )->dropDownList($item)->label('用户组')?>

<!--    <?/*= $form->field($model, 'role')->textInput() */?>

    <?/*= $form->field($model, 'status')->textInput() */?>

    <?/*= $form->field($model, 'created_at')->textInput() */?>

    --><?/*= $form->field($model, 'updated_at')->textInput() */?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
