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
        return $this->render('welcome',[
            'log' => $log,
            'pages' => $pages,
        ]);
    }
}

