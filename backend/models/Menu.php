<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent
 * @property string $route
 * @property integer $order
 * @property string $data
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent', 'order'], 'integer'],
            [['data'], 'string'],
            [['name'], 'string', 'max' => 128],
            [['route'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'parent' => '父级',
            'route' => '路由',
            'order' => '排序',
            'data' => '描述',
        ];
    }

    //获取顶级菜单列表
    public function  getAllMenu(){
        $menu = Yii::$app->db->createCommand("SELECT * FROM `menu` WHERE parent='0'")->queryAll();
        return $menu;
    }
    //获取所有菜单列表
    public function  getMenuList(){
        $menu = Yii::$app->db->createCommand("SELECT * FROM `menu`")->queryAll();
        $menu = $this->list_to_tree($menu,'id','parent');
        return $menu;
    }

    //通过id找到router
    public function getRouteById($id){
        $router = Yii::$app->db->createCommand("SELECT * FROM `menu` WHERE id='$id'")->queryOne();
        return $router['route'];
    }


}
