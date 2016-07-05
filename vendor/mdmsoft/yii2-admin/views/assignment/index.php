<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel mdm\admin\models\searchs\Assignment */
/* @var $usernameField string */
/* @var $extraColumns string[] */

$this->title = Yii::t('rbac-admin', 'Assignments');
$this->params['breadcrumbs'][] = $this->title;

$columns = [
    ['class' => 'yii\grid\SerialColumn'],
    $usernameField,
];
if (!empty($extraColumns)) {
    $columns = array_merge($columns, $extraColumns);
}
$columns[] = [
    'class' => 'yii\grid\ActionColumn',
    'template' => '{view}'
];
?>

<div class="wrapper wrapper-content">

    <div class="ibox-content">
        <div class="assignment-index">

            <h1><?= Html::encode($this->title) ?></h1>

            <?php Pjax::begin(); ?>
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'layout' => '{items}{summary}{pager}', //数据布局

                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'label' => '用户名',
                        'attribute' => 'username',
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => '操作',
                        'options' => ['width' => '100px;'],
                        'template' => '{view}',
                        'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a('<i class="fa fa-edit">分配</i>', $url, [
                                    'title' => Yii::t('app', 'view'),
                                    'class' => 'del btn btn-primary btn-xs',
                                ]);
                            }
                        ],

                    ],
                ],

            ]);
            ?>
            <?php Pjax::end(); ?>

        </div>
    </div>
</div>
