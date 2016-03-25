<?php

namespace backend\models;

use Yii;
use common\models\base\BaseModel;
/**
 * This is the model class for table "auth_item".
 *
 * @property string $name
 * @property integer $type
 * @property string $description
 * @property string $rule_name
 * @property string $data
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property AuthAssignment[] $authAssignments
 * @property AuthRule $ruleName
 * @property AuthItemChild[] $authItemChildren
 * @property AuthItemChild[] $authItemChildren0
 * @property AuthItem[] $children
 * @property AuthItem[] $parents
 */
class AuthItem extends BaseModel
{
    const T_ROLE = 1;   //角色
    const T_POWER = 2;  //权限

    //定义场景
    const SCENARIOS_CREATE = 'create';
    const SCENARIOS_DELETE = 'delete';
    const SCENARIOS_UPDATE = 'update';


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auth_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['type', 'created_at', 'updated_at'], 'integer'],
            [['description', 'data'], 'string'],
            [['name', 'rule_name'], 'string', 'max' => 64],
            [['rule_name'], 'exist', 'skipOnError' => true, 'targetClass' => AuthRule::className(), 'targetAttribute' => ['rule_name' => 'name']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => '名称',
            'type' => '类型',
            'description' => '描述',
            'rule_name' => 'Rule Name',
            'data' => 'Data',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthAssignments()
    {
        return $this->hasMany(AuthAssignment::className(), ['item_name' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRuleName()
    {
        return $this->hasOne(AuthRule::className(), ['name' => 'rule_name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthItemChildren()
    {
        return $this->hasMany(AuthItemChild::className(), ['parent' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthItemChildren0()
    {
        return $this->hasMany(AuthItemChild::className(), ['child' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(AuthItem::className(), ['name' => 'child'])->viaTable('auth_item_child', ['parent' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParents()
    {
        return $this->hasMany(AuthItem::className(), ['name' => 'parent'])->viaTable('auth_item_child', ['child' => 'name']);
    }

    /**
     * 场景设置
     * @see \yii\base\Model::scenarios()
     */
    public function scenarios()
    {
        $scenarios = [
            self:: SCENARIOS_CREATE => ['name', 'type', 'description'],
            self:: SCENARIOS_DELETE => ['name'],
            self:: SCENARIOS_UPDATE => ['name', 'type', 'description'],
        ];
        return array_merge(parent:: scenarios(), $scenarios);
    }
    /**
     * 角色&权限的创建方法
     * @return boolean 返回成功或者失败的状态值
     */
    public function addItem()
    {
        //实例化AuthManager类
        $auth = Yii::$app->authManager;
        if($this->type == self::T_ROLE){
            $item = $auth->createRole($this->name);
            $item->description = $this->description?:'创建['.$this->name.']角色';
        }else{
            $item = $auth->createPermission($this->name);
            $item->description = $this->description?:'创建['.$this->name.']权限';
        }

        return $auth->add($item);

    }
    /**
     * 角色&权限的删除方法
     * @return boolean 返回成功或者失败的状态值
     */
    public function romoveItem()
    {
        $this->name = trim($this->name);
        if($this->validate()){
            $auth = Yii::$app->authManager;
            $item = $auth->getRole($this->name)?:$auth->getPermission($this->name);
            return $auth->remove($item);
        }

        return false;
    }
    /**
     * 获取权限
     * @param unknown $id
     * @throws \Exception
     */

    public function getItem($id) {
        $model = AuthItem:: findOne(['name'=>$id]);
        if(!$model)
            throw new \Exception( '编辑的角色或权限不存在！' );

        $this-> name = $model-> name;
        $this-> type = $model-> type;
        $this-> description = $model-> description;

        return $this;
    }

    /**
     * 编辑权限
     * @param unknown $item_name
     * @return boolean
     */
    public function updateItem($item_name)
    {
        $auth = Yii:: $app-> authManager;
        if($this->type == self::T_ROLE){
            $item = $auth->createRole($this-> name);
            $item-> description = $this-> description?: '创建['.$this-> name. ']角色';
        }else{
            $item = $auth->createPermission($this-> name);
            $item-> description = $this-> description?: '创建['.$this-> name. ']权限';
        }
        return $auth->update($item_name, $item);
    }
    //获取所有的权限
    public function getAllPermission(){
        $permission = self::find()->where(['type'=>2])->all();
        return $permission;
    }
}
