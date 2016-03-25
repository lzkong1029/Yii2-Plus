<?php
namespace backend\models;
/**
 * @author Xianan Huang
 *
 */
use Yii;
use yii\base\Model;
use backend\models\AuthRule;
class ItemForm extends Model
{
    public $name;

    public $type;

    public $description;

    const T_ROLE = 1;   //角色
    const T_POWER = 2;  //权限

    //定义场景
    const SCENARIOS_CREATE = 'create';
    const SCENARIOS_DELETE = 'delete';

    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            ['name', 'unique', 'targetClass' => '\common\models\AuthItemModel', 'message' => '此名称已经被占用。'],
            ['type', 'integer'],
            [['name', 'description'], 'string', 'max' => 25],
            [['rule_name'], 'exist', 'skipOnError' => true, 'targetClass' => AuthRule::className(), 'targetAttribute' => ['rule_name' => 'name']]
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => '名称',
            'type' => '类型',
            'description' => '描述',
        ];
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
}