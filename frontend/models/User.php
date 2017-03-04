<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;

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
 * @property string $phone
 * @property integer $type
 * @property integer $third_user_id
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
            [['user_sn'], 'required'],
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
            'user_id' => 'User ID',
            'user_sn' => 'User Sn',
            'is_del' => 'Is Del',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'user_name' => 'User Name',
            'email' => 'Email',
            'age' => 'Age',
            'gender' => 'Gender',
            'portrait' => 'Portrait',
            'address' => 'Address',
            'phone' => 'Phone No.',
            'type' => 'Type',
            'third_user_id' => 'Third User Id',
        ];
    }

    public function getPraises()
    {
        return $this->hasMany(PraiseAudio::className(), ['user_id'=>'user_id']);
    }

    public function getCollects()
    {
        return $this->hasMany(CollectAudio::className(), ['user_id'=>'user_id']);
    }

    public function getComments()
    {
        return $this->hasMany(CommentAudio::className(), ['user_id'=>'user_id']);
    }

    public function getMesses()
    {
        return $this->hasMany(SystemMessage::className(), ['target_user_id'=>'user_id']);
    }

    public function behaviors()
    {
        return [
            [
                /**
                 * TimestampBehavior：
                 * 创建的时候，默认插入当前时间戳给created_at和updated_at字段
                 * 更新的时候，默认更新当前时间戳给updated_at字段
                 */
                'class'              => TimestampBehavior::className(),
                'createdAtAttribute' => 'create_time',
                'updatedAtAttribute' => 'update_time',
                // 'value'              => time(),
            ],
        ];
    }
}
