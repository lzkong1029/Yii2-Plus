<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "log".
 *
 * @property string $username
 * @property string $ip
 * @property string $data
 * @property string $create_time
 */
class Log extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'create_time'], 'string', 'max' => 32],
            [['ip', 'data'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'ip' => 'Ip',
            'data' => 'Data',
            'create_time' => 'Create Time',
        ];
    }
}
