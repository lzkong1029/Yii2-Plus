<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = '菜单';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wrapper wrapper-content">
    <div class="ibox float-e-margins">
        <div class="ibox-content">
            <p>
                <?= Html::a('创建菜单', ['create'], ['class' => 'btn btn-primary']) ?>
            </p>

            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>名称</th>
                                        <th>父级</th>
                                        <th>路由</th>
                                        <th>状态</th>
                                        <th>排序</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($menu as $vo):?>
                                        <tr>
                                            <td><?=$vo['id']?></td>
                                            <td><?=$vo['name']?></td>
                                            <td><?=$vo['parent']?></td>
                                            <td><?=$vo['route']?></td>
                                            <td><?=$vo['status'] >0 ? '显示 ' : '隐藏'?></td>
                                            <td><?=($vo['sort']==''?'未排序':$vo['sort'])?></td>
                                            <td><a class="btn btn-primary btn-xs" href="<?=Url::toRoute(['menu/update','id'=>$vo['id']])?>"><i class="fa fa-edit"></i>编辑</a>  <a class="btn btn-default btn-xs"  href="<?=Url::toRoute(['menu/delete','id'=>$vo['id']])?>"><i class="fa fa-close"></i>删除</a></td>
                                        </tr>
                                        <?php if(!empty($vo['_child'])):?>
                                            <?php foreach($vo['_child'] as $v):?>
                                                <tr>
                                                <td><?=$v['id']?></td>
                                                <td><?=$v['name']?></td>
                                                <td><?=$v['parent']?></td>
                                                <td><?=$v['route']?></td>
                                                <td><?=$v['status'] > 0 ? '显示' : '隐藏'?></td>
                                                <td><?=($v['sort']==''?'未排序':$v['sort'])?></td>
                                                <td><a class="btn btn-primary btn-xs" href="<?=Url::toRoute(['menu/update','id'=>$v['id']])?>"><i class="fa fa-edit"></i>编辑</a>  <a class="btn btn-default btn-xs" href="<?=Url::toRoute(['menu/delete','id'=>$v['id']])?>"><i class="fa fa-close"></i>删除</a></td>
                                                </tr>
                                            <?php endforeach;?>

                                        <?php endif;?>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                                <!--分页-->
                                <!--<div class="f-r">
                                    <?/*= LinkPager::widget([
                                        'pagination'=>$pages,
                                        'firstPageLabel' => '首页',
                                        'nextPageLabel' => '下一页',
                                        'prevPageLabel' => '上一页',
                                        'lastPageLabel' => '末页',
                                    ]) */?>
                                </div>-->

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
