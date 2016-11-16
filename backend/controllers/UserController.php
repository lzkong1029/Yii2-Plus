<?php

namespace backend\controllers;
use backend\models\AuthItem;
use backend\models\Menu;
use backend\models\PasswordForm;
use yii\data\Pagination;
use backend\models\User;
use common\models\UserExt;
use backend\models\AuthAssignment;
use backend\components\Tree;

use Yii;

class UserController extends \yii\web\Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    //用户列表
    public function actionList()
    {
        $username = Yii::$app->user->identity->username;
        if (Yii::$app->request->post()) {
            if($_POST['username']!=''){
                $username = $_POST['username'];
                $data = User::find()->where(['username'=>$username]);
            }else{
                $data = User::find();
            }
            $pages = new Pagination(['totalCount' =>$data->count(), 'pageSize' => '20']);
            $user = $data->joinWith('usergroup')->offset($pages->offset)->limit($pages->limit)->all();
            return $this->render('list',[
                'user'=>$user,
                'pages' => $pages
            ]);
        }
        $data = User::find();
        $pages = new Pagination(['totalCount' =>$data->count(), 'pageSize' => '20']);
        $user = $data->joinWith('usergroup')->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('list',[
            'user'=>$user,
            'pages' => $pages
        ]);
    }
    //新增用户
    public function actionCreate()
    {
        $model = new User();
        $model1 = new AuthItem();

        $auth = Yii::$app->authManager;
        $item = $auth->getRoles();
        $itemArr =array();
        foreach($item as $v){
            $itemArr[] .= $v->name;
        }
        foreach($itemArr as $key=>$value)
        {
            $item_one[$value]=$value;
        }
        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();
            $model->username = $post['User']['username'];

            $user = User::find()->where(['username'=>$model->username])->all();
            if(!empty($user)){
                \Yii::$app->getSession()->setFlash('error', '用户名已存在！');
                return $this->redirect(['create']);
            }

            $model->email = $post['User']['email'];
            $model->setPassword($post['User']['auth_key']);
            $model->generateAuthKey();
            $model->created_at = time();
            $model->save();
            $user_id = $model->attributes['id']; //获取插入后id
            $role = $auth->createRole($post['AuthItem']['name']);//创建角色对象
            $auth->assign($role, $user_id);//添加对应关系

            return $this->redirect(['list']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'model1' => $model1,
                'item' => $item_one
            ]);
        }
    }

    //更新用户
    public function actionUpdate(){
        $item_name = Yii::$app->request->get('item_name');
        $id = Yii::$app->request->get('id');
        $model = User::find()->joinWith('usergroup')->where(['id' => $id])->one();

        $auth = Yii::$app->authManager;
        $item = $auth->getRoles();
        $itemArr =array();
        foreach($item as $v){
            $itemArr[] .= $v->name;
        }
        foreach($itemArr as $key=>$value)
        {
            $item_one[$value]=$value;
        }
        $model1 = $this->findModel($id);

        if ($model1->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();
            //更新密码
            if(!empty($post['User']['auth_key_new'])){
                $model1->setPassword($post['User']['auth_key_new']);
                $model1->generateAuthKey();
            }else{
                $model1->auth_key = $post['User']['auth_key'];
            }
            $model1->save($post);

            //分配角色
            if(isset($post['AuthAssignment'])){
                $role = $auth->createRole($post['AuthAssignment']['item_name']); //创建角色对象
                $user_id = $id;//获取用户id
                $auth->revokeAll($user_id);
                $auth->assign($role, $user_id);//添加对应关系
            }
            return $this->redirect(['user/list']);
        }
        return $this->render('update',[
            'model' => $model,
            'item' => $item_one
        ]);
    }
    //删除用户
    public function actionDelete($id)
    {
        $connection=Yii::$app->db;
        $transaction=$connection->beginTransaction();
        try
        {
            $connection->createCommand()->delete("user", "id = '$id'")->execute();
            $connection->createCommand()->delete("auth_assignment", "user_id = '$id'")->execute();
            $transaction->commit();
        }
        catch(Exception $ex)
        {
            $transaction->rollBack();
        }
        return $this->redirect(['list']);
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
