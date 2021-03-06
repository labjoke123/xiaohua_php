<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $user_id
 * @property string $user_sn
 * @property integer $is_del
 * @property integer $create_time
 * @property integer $update_time
 * @property string $user_name
 * @property string $email
 * @property integer $age
 * @property integer $gender
 * @property string $portrait
 * @property string $address
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_sn', 'is_del', 'create_time', 'update_time'], 'required'],
            [['is_del', 'create_time', 'update_time', 'age', 'gender'], 'integer'],
            [['address'], 'string'],
            [['user_sn', 'user_name'], 'string', 'max' => 64],
            [['email'], 'string', 'max' => 128],
            [['portrait'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => '自增ID',
            'user_sn' => '用户序列号',
            'is_del' => 'Is Del',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'user_name' => 'User Name',
            'email' => 'Email',
            'age' => 'Age',
            'gender' => 'Gender',
            'portrait' => 'Portrait',
            'address' => 'Address',
        ];
    }
}
