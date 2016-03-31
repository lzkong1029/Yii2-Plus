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
                    <!--<div class="row">
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input type="text" placeholder="请输入关键词" class="input-sm form-control"> <span class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-primary"> 搜索</button> </span>
                            </div>
                        </div>
                    </div>-->
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>

                                <th></th>
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
                                    <td>
                                        <input type="checkbox" checked class="i-checks" name="input[]">
                                    </td>
                                    <td><?=$vo['id']?></td>
                                    <td><?=$vo['username']?></td>
                                    <td><?=$vo['usergroup']['item_name']?></td>
                                    <td><?=$vo['email']?></td>
                                    <td><?=date('Y-m-d H:i:s',$vo['created_at'])?></td>
                                    <td><a class="btn btn-primary btn-xs" href="<?=Url::toRoute(['user/update','item_name'=>$vo['usergroup']['item_name'],'id'=>$vo['id']])?>"><i class="fa fa-edit"></i>编辑</a>  <a class="btn btn-default btn-xs"><i class="fa fa-close"></i>禁用</a></td>
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
<script src="js/jquery.min.js?v=2.1.4"></script>
<script src="js/bootstrap.min.js?v=3.3.6"></script>
<script src="js/plugins/peity/jquery.peity.min.js"></script>
<script src="js/content.min.js?v=1.0.0"></script>
<script src="js/plugins/iCheck/icheck.min.js"></script>
<script src="js/demo/peity-demo.min.js"></script>
<script>
    $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
</script>
<script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script>