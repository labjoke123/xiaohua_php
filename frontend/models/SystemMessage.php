<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%system_message}}".
 *
 * @property integer $mess_id
 * @property string $mess_sn
 * @property integer $trigger_user_id
 * @property integer $target_user_id
 * @property integer $mess_type
 * @property integer $audio_id
 * @property integer $text_id
 * @property integer $is_delete
 * @property integer $create_time
 * @property integer $update_time
 * @property string $mess_content
 */
class SystemMessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%system_message}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mess_sn', 'trigger_user_id', 'target_user_id', 'mess_type', 'mess_content'], 'required'],
            [['trigger_user_id', 'target_user_id', 'mess_type', 'is_delete', 'create_time', 'update_time'], 'integer'],
            [['mess_content'], 'string'],
            [['mess_sn'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mess_id' => 'Mess ID',
            'mess_sn' => 'Mess Sn',
            'trigger_user_id' => 'Trigger User ID',
            'target_user_id' => 'Target User ID',
            'mess_type' => 'Mess Type',
            'audio_id' => 'Audio ID',
            'text_id' => 'Text ID',
            'is_delete' => 'Is Delete',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'mess_content' => 'Mess Content',
        ];
    }

    public function getTrigger()
    {
        return $this->hasOne(User::className(), ['user_id'=>'trigger_user_id']);
    }

    public function getTarget()
    {
        return $this->hasOne(User::className(), ['target_user_id'=>'user_id']);
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
