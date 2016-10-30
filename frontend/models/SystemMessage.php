<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%system_message}}".
 *
 * @property integer $mess_id
 * @property string $mess_sn
 * @property integer $trigger_user_id
 * @property integer $target_user_id
 * @property integer $mess_type
 * @property string $mess_content
 * @property integer $is_delete
 * @property integer $create_time
 * @property integer $update_time
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
            [['mess_sn', 'trigger_user_id', 'target_user_id', 'mess_type', 'mess_content', 'is_delete', 'create_time', 'update_time'], 'required'],
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
            'mess_content' => 'Mess Content',
            'is_delete' => 'Is Delete',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
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
}
