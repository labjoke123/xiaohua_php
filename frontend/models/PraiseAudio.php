<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%praise_audio}}".
 *
 * @property integer $praise_id
 * @property string $praise_sn
 * @property integer $user_id
 * @property integer $audio_id
 * @property string $praise_level
 * @property integer $is_delete
 * @property integer $create_time
 * @property integer $update_time
 */
class PraiseAudio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%praise_audio}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'audio_id', 'praise_level'], 'required'],
            [['user_id', 'audio_id', 'is_delete'], 'integer'],
            [['praise_level'], 'string'],
            [['praise_sn'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'praise_id' => 'Praise ID',
            'praise_sn' => 'Praise Sn',
            'user_id' => 'User ID',
            'audio_id' => 'Audio ID',
            'praise_level' => 'Praise Level',
            'is_delete' => 'Is Delete',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }

    public function getAudio()
    {
        return $this->hasOne(Audio::className(), ['audio_id'=>'audio_id']);
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
