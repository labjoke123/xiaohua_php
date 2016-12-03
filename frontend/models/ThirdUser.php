<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%third_user}}".
 *
 * @property integer $third_user_id
 * @property string $third_user_sn
 * @property string $identifier
 * @property string $user_info
 * @property integer $type
 * @property integer $is_del
 * @property integer $create_time
 * @property integer $update_time
 */
class ThirdUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%third_user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['third_user_sn', 'identifier'], 'required'],
            [['user_info'], 'string'],
            [['type', 'is_del', 'create_time', 'update_time'], 'integer'],
            [['third_user_sn'], 'string', 'max' => 64],
            [['identifier'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'third_user_id' => '自增ID',
            'third_user_sn' => '用户序列号',
            'identifier' => 'Identifier',
            'user_info' => 'User Info',
            'type' => '0 自有 1 微信 2 QQ 3 微博 4 豆瓣 ',
            'is_del' => 'Is Del',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
