<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%message_user}}".
 *
 * @property integer $mess_id
 * @property string $mess_sn
 * @property integer $user_id
 * @property integer $target_user_id
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
            [['mess_sn', 'user_id', 'target_user_id', 'mess_content', 'is_delete', 'create_time', 'update_time'], 'required'],
            [['user_id', 'target_user_id', 'is_delete', 'create_time', 'update_time'], 'integer'],
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
            'user_id' => 'User ID',
            'target_user_id' => 'Target User ID',
            'mess_content' => 'Mess Content',
            'is_delete' => 'Is Delete',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
