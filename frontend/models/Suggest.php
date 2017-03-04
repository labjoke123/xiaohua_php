<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%suggest}}".
 *
 * @property integer $suggest_id
 * @property string $suggest_sn
 * @property integer $user_id
 * @property string $content
 * @property integer $is_delete
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $is_reply
 */
class Suggest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%suggest}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'content'], 'required'],
            [['suggest_id', 'user_id', 'is_delete', 'create_time', 'update_time', 'is_reply'], 'integer'],
            [['content'], 'string'],
            [['suggest_sn'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'suggest_id' => 'Suggest ID',
            'suggest_sn' => 'Suggest Sn',
            'user_id' => 'User ID',
            'content' => 'Content',
            'is_delete' => 'Is Delete',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'is_reply' => 'Is Reply',
        ];
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
