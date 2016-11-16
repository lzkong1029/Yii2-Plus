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
        <?php if(\Yii::$app->user->can('/site/index')):?> <!--判断是否有‘/site/index’权限，有则显示，无则隐藏-->
        <!--<div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-success pull-right">月</span>
                    <h5>收入</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">40 886,200</h1>
                    <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i>
                    </div>
                    <small>总收入</small>
                </div>
            </div>
        </div>-->
        <?php endif;?>
        <div class="col-sm-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-right">历史</span>
                    <h5>访客</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?=\backend\components\Helper::getHistoryVisNum()?></h1>
                    <small>访客</small>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-danger pull-right">最近一个月</span>
                    <h5>活跃用户</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?=\backend\components\Helper::getMonthHistoryVisNum()?></h1>
                    <small><?= date('m')?>月</small>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div id="history"></div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>用户名</th>
                            <th>登录IP</th>
                            <th>登录时间</th>
                            <th>备注</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($log as $vo):?>
                            <tr>
                                <td><?=$vo['id']?></td>
                                <td><?=$vo['username']?></td>
                                <td><?=$vo['ip']?></td>
                                <td><?= date('Y-m-d H:i:s',$vo['create_time'])?></td>
                                <td><?=str_replace('-','',$vo['data'])?></td>
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
<?=Html::jsFile('@web/js/plugins/Highcharts/4.1.7/js/highcharts.js')?>
<?=Html::jsFile('@web/js/plugins/Highcharts/4.1.7/js/modules/exporting.js')?>


<script type="text/javascript">
    $(function () {
        $('#history').highcharts({
            title: {
                text: '',
                x: -20 //center
            },
            credits: { enabled:false }, //屏蔽右下角
            exporting: { enabled:false }, //屏蔽右上角
            subtitle: {
                text: '',
                x: -20
            },
            xAxis: {
                categories: [<?=$HistoryMonthStr?>]
            },
            yAxis: {

                title: {
                    text: '访客/人'
                },
                //min: 7.5, // 这个用来控制y轴的开始刻度（最小刻度），另外还有一个表示最大刻度的max属性
                startOnTick: false, // y轴坐标是否从某一刻度开始（这个设定与标题无关）
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: '人',
                pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y:,.0f} 人</b><br/>',
                shared: true
            },
            /*legend: {
             layout: 'vertical',
             align: 'right',
             verticalAlign: 'middle',
             borderWidth: 0
             },*/
            series: [{
                name: '访客数',
                data: [<?=$HistoryMonthNum?>]
            }]
        });
    });
</script>
