<?php

namespace backend\controllers;
use backend\models\Log;
use backend\models\Menu;
use backend\models\PasswordForm;
use yii\data\Pagination;

use Yii;

class IndexController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionWelcome()
    {
        //登录记录
        $query = Log::find();
        $count = $query->count();
        $pages = new Pagination(['totalCount' => $count,'pageSize' => '10']);
        $log = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy('id desc')
            ->all();

        $sql = "SELECT *,FROM_UNIXTIME(create_time,'%Y-%m') as period,COUNT(*) as times FROM log GROUP BY period LIMIT 12";
        $History = Yii::$app->db->createCommand($sql)->queryAll();
        $HistoryMonthStr = '';
        $HistoryMonthNum = '';
        foreach($History as $val){
            $HistoryMonthStr .= "'".$val['period']."',";
            $HistoryMonthNum .= $val['times'].",";
        }
        $HistoryMonthStr = substr($HistoryMonthStr,0,-1);
        $HistoryMonthNum = substr($HistoryMonthNum,0,-1);
        return $this->render('welcome',[
            'log' => $log,
            'pages' => $pages,
            'HistoryMonthStr' => $HistoryMonthStr,
            'HistoryMonthNum' => $HistoryMonthNum,
        ]);
    }
}

