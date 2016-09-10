<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%message_user}}".
 *
 * @property integer $mess_id
 * @property string $mess_sn
 * @property string $user_sn
 * @property string $target_user_sn
 * @property string $mess_content
 * @property integer $is_delete
 * @property integer $create_time
 * @property integer $update_time
 */
class MessUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%message_user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mess_sn', 'user_sn', 'target_user_sn', 'mess_content', 'is_delete', 'create_time', 'update_time'], 'required'],
            [['mess_content'], 'string'],
            [['is_delete', 'create_time', 'update_time'], 'integer'],
            [['mess_sn', 'user_sn', 'target_user_sn'], 'string', 'max' => 32],
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
            'user_sn' => 'User Sn',
            'target_user_sn' => 'Target User Sn',
            'mess_content' => 'Mess Content',
            'is_delete' => 'Is Delete',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
