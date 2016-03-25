<?php

namespace backend\controllers;
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
        return $this->render('welcome');
    }
}
