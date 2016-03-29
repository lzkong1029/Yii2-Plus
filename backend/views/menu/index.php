<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '菜单';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox float-e-margins">
        <div class="ibox-content">
            <h1><?= Html::encode($this->title) ?></h1>
            <p>
                <?= Html::a('创建菜单', ['create'], ['class' => 'btn btn-primary']) ?>
            </p>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'name',
                    'parent',
                    'route',
                    'order',
                    // 'data:ntext',

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => '操作',
                        'template' => '{update} {delete}',//只需要展示删除和更新
                        'headerOptions' => ['width' => '240'],
                        'buttons' => [
                            'delete' => function($url, $model, $key){
                                return Html::a('<i class="fa fa-close"></i> 删除',
                                    ['delete', 'id' => $key],
                                    [
                                        'class' => 'btn btn-default btn-xs',
                                        'data' => ['confirm' => '你确定要删除吗？',]
                                    ]
                                );
                            },
                            'update' => function($url, $model, $key){
                                return Html::a('<i class="fa fa-edit"></i> 编辑',
                                    ['update', 'id' => $key],
                                    [
                                        'class' => 'btn btn-primary btn-xs'
                                    ]
                                );
                            },
                        ],
                    ],


                ],
            ]); ?>
        </div>

    </div>

</div>
