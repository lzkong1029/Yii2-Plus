<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this  yii\web\View */
/* @var $model mdm\admin\models\BizRule */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel mdm\admin\models\searchs\BizRule */

$this->title = Yii::t('rbac-admin', 'Rules');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wrapper wrapper-content">

    <div class="ibox-content">
        <div class="role-index">

            <h1><?= Html::encode($this->title) ?></h1>

            <p>
                <?= Html::a(Yii::t('rbac-admin', 'Create Rule'), ['create'], ['class' => 'btn btn-sm btn-info']) ?>
            </p>

            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'name',
                        'label' => Yii::t('rbac-admin', 'Name'),
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => '操作',
                        'options' => ['width' => '100px;'],
                        'template' => '{view} {update} {delete}',
                        'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a('<i class="fa fa-edit">查看</i>', $url, [
                                    'title' => Yii::t('app', 'view'),
                                    'class' => 'del btn btn-primary btn-xs',
                                ]);
                            },
                            'update' => function ($url, $model) {
                                return Html::a('<i class="fa fa-unlock-alt">更新</i>', $url, [
                                    'title' => Yii::t('app', 'update'),
                                    'class' => 'del btn btn-success btn-xs',
                                ]);
                            },
                            'delete' => function ($url, $model) {
                                return Html::a('<i class="fa fa-close">删除</i>', $url, [
                                    'title' => Yii::t('app', 'delete'),
                                    'class' => 'del btn btn-default btn-xs',
                                ]);
                            }
                        ],
                    ],
                ],
            ]);
            ?>

        </div>
    </div>
</div>
