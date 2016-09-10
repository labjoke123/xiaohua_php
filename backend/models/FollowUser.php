<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%follow_user}}".
 *
 * @property integer $follow_id
 * @property string $follow_sn
 * @property string $user_sn
 * @property string $target_user_sn
 * @property integer $is_delete
 * @property integer $create_time
 * @property integer $update_time
 */
class FollowUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%follow_user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['follow_sn', 'user_sn', 'target_user_sn', 'is_delete', 'create_time', 'update_time'], 'required'],
            [['is_delete', 'create_time', 'update_time'], 'integer'],
            [['follow_sn', 'user_sn', 'target_user_sn'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'follow_id' => 'Follow ID',
            'follow_sn' => 'Follow Sn',
            'user_sn' => 'User Sn',
            'target_user_sn' => 'Target User Sn',
            'is_delete' => 'Is Delete',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
