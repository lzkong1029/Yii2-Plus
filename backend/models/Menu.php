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
        $menu = Yii::$app->db->createCommand("SELECT * FROM `menu` WHERE parent='0' ")->queryAll();
        return $menu;
    }
    //获取所有菜单列表
    public function  getMenuList(){
        $menu = Yii::$app->db->createCommand("SELECT * FROM `menu` ORDER BY sort ASC ")->queryAll();
        $menu = self::list_to_tree($menu,'id','parent');
        return $menu;
    }
    //获取左侧菜单列表
    public function  getLeftMenuList(){
        $uid = Yii::$app->user->identity->getId();
        $auth = Yii::$app->authManager;
        $Roles = $auth->getRolesByUser($uid);
        foreach($Roles as $vo){
            $name = $vo->name;
        }
        $Permission = $auth->getPermissionsByRole($name);
        $RolesList = '';
        foreach($Permission as $vo){
            $RolesList .= "'".$vo->name."',";
        }
        $RolesList = substr($RolesList,0,-1);

        $menu = Yii::$app->db->createCommand("SELECT * FROM `menu` WHERE (`status`=1 AND route IN ($RolesList)) OR parent = 0 ORDER BY sort ASC ")->queryAll();
        $menu = self::list_to_tree2($menu,'id','parent');
        return $menu;
    }

    //通过id找到router
    public function getRouteById($id){
        $router = Yii::$app->db->createCommand("SELECT * FROM `menu` WHERE id='$id'")->queryOne();
        return $router['route'];
    }

    /**
     * 把返回的数据集转换成Tree
     * @param array $list 要转换的数据集
     * @param string $pid parent标记字段
     * @param string $level level标记字段
     * @return array
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    function list_to_tree($list, $pk='id', $pid = 'pid', $child = '_child', $root = 0) {
        // 创建Tree
        $tree = array();
        if(is_array($list)) {
            // 创建基于主键的数组引用
            $refer = array();
            foreach ($list as $key => $data) {
                $refer[$data[$pk]] =& $list[$key];
            }
            foreach ($list as $key => $data) {
                // 判断是否存在parent
                $parentId =  $data[$pid];
                if ($root == $parentId) {
                    $tree[] =& $list[$key];
                }else{
                    if (isset($refer[$parentId])) {
                        $parent =& $refer[$parentId];
                        $list[$key]['name'] ='&nbsp;&nbsp;&nbsp;&nbsp;|--'.$list[$key]['name'];
                        $parent[$child][] =& $list[$key];
                    }
                }
            }
        }
        return $tree;
    }

    function list_to_tree2($list, $pk='id', $pid = 'pid', $child = '_child', $root = 0) {
        // 创建Tree
        $tree = array();
        if(is_array($list)) {
            // 创建基于主键的数组引用
            $refer = array();
            foreach ($list as $key => $data) {
                $refer[$data[$pk]] =& $list[$key];
            }
            foreach ($list as $key => $data) {
                // 判断是否存在parent
                $parentId =  $data[$pid];
                if ($root == $parentId) {
                    $tree[] =& $list[$key];
                }else{
                    if (isset($refer[$parentId])) {
                        $parent =& $refer[$parentId];
                        $list[$key]['name'] =$list[$key]['name'];
                        $parent[$child][] =& $list[$key];
                    }
                }
            }
        }
        return $tree;
    }


}
