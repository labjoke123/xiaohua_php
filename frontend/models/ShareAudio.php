<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%share_audio}}".
 *
 * @property integer $share_id
 * @property string $share_sn
 * @property integer $user_id
 * @property integer $audio_id
 * @property integer $is_delete
 * @property integer $create_time
 * @property integer $update_time
 */
class ShareAudio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%share_audio}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['share_sn', 'user_id', 'audio_id'], 'required'],
            [['user_id', 'audio_id', 'is_delete', 'create_time', 'update_time'], 'integer'],
            [['share_sn'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'share_id' => 'Share ID',
            'share_sn' => 'Share Sn',
            'user_id' => 'User ID',
            'audio_id' => 'Audio ID',
            'is_delete' => 'Is Delete',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
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
