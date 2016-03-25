<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\AuthItem */

$this->title = '更新用户 ';
?>
<div class="wrapper wrapper-content animated fadeInRight">

    <h4><?= Html::encode($this->title) ?></h4>
    <hr>
    <div class="auth-item-form col-sm-4">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'id')->hiddenInput()->label('')?>

        <?= $form->field($model, 'username')->textInput(['readonly'=>true])->label('用户名') ?>

        <?= $form->field($model, 'email')->textInput(['email' => true])->label('邮箱')?>

        <?= $form->field($model->usergroup, 'item_name' )->dropDownList($item)->label('用户组')?>

        <div class="form-group">
            <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
