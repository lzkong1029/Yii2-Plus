<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'My Yii Application';

?>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">

                <div class="ibox-content">
                    <div class="row">
                    <div class="col-sm-3">
                        <a class="btn btn-info btn-sm" href="<?= Url::toRoute('user/create')?>">新增用户</a>
                    </div>
                    </div>
                    <hr>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>用户名</th>
                                <th>用户组</th>
                                <th>邮箱</th>
                                <th>创建时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($user as $vo):?>
                                <tr>
                                    <td><?=$vo['id']?></td>
                                    <td><?=$vo['username']?></td>
                                    <td><?=$vo['usergroup']['item_name']?></td>
                                    <td><?=$vo['email']?></td>
                                    <td><?=date('Y-m-d H:i:s',$vo['created_at'])?></td>
                                    <td><a class="btn btn-primary btn-xs" href="<?=Url::toRoute(['user/update','item_name'=>$vo['usergroup']['item_name'],'id'=>$vo['id']])?>"><i class="fa fa-edit"></i>编辑</a>  <?php if($vo['username'] !='admin'):?><a href="<?=Url::toRoute(['user/delete','id'=>$vo['id']])?>" class="btn btn-default btn-xs"><i class="fa fa-close"></i>删除</a><?php endif;?></td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                        <!--分页-->
                        <div class="f-r">
                            <?= LinkPager::widget([
                                'pagination'=>$pages,
                                'firstPageLabel' => '首页',
                                'nextPageLabel' => '下一页',
                                'prevPageLabel' => '上一页',
                                'lastPageLabel' => '末页',
                            ]) ?>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
