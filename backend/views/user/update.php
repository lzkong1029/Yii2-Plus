<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\AuthItem */

$this->title = '更新用户 ';
?>
<div class="wrapper wrapper-content">
    <div class="ibox-content">
        <div class="row pd-10">
            <h1><?= Html::encode($this->title) ?></h1>
            <hr>
            <div class="auth-item-form col-sm-4">
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'id')->hiddenInput()->label('') ?>

                <?= $form->field($model, 'username')->textInput(['readonly'=>true])->label('用户名') ?>
                <?php if($model->username =='admin'):?>
                    <?= $form->field($model, 'auth_key_new')->textInput(['value'=>'','readonly'=>true])->label('密码')?>
                <?php else:?>
                    <?= $form->field($model, 'auth_key_new')->textInput(['value'=>''])->label('密码')?>
                <?php endif;?>

                <?= $form->field($model, 'auth_key')->hiddenInput()->label(false)?>

                <?= $form->field($model, 'email')->textInput(['email' => true])->label('邮箱')?>
                <?php if($model->username =='admin'):?>
                    <?= $form->field($model->usergroup, 'item_name' )->dropDownList($item,['disabled'=>true])->label('用户组')?>
                <?php else:?>
                    <?= $form->field($model->usergroup, 'item_name' )->dropDownList($item)->label('用户组')?>
                <?php endif;?>
                <div class="form-group">
                    <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

</div>
