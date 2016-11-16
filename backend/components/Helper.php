<?php
/**
 * User: lzkong1029
 * Date: 2016-7-6
 * Time: 15:10
 * Description:静态公共函数类库
 */

namespace backend\components;
use backend\models\Log;
use Yii;

class Helper {

    public static function hello(){
        echo 'hello';
    }

    //历史访客数
    public static function getHistoryVisNum(){
        $res = Log::find()->count();
        return $res;
    }

    //最近一个月访问量
    public static function getMonthHistoryVisNum(){
        $LastMonth = strtotime("-1 month");
        $res = Log::find()->where(['>','create_time',$LastMonth])->count();
        return $res;
    }

}