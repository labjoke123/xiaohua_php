<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%praise_audio}}".
 *
 * @property integer $praise_id
 * @property string $praise_sn
 * @property string $user_sn
 * @property string $audio_sn
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
            [['praise_sn', 'user_sn', 'audio_sn', 'praise_level', 'is_delete', 'create_time', 'update_time'], 'required'],
            [['praise_level'], 'string'],
            [['is_delete', 'create_time', 'update_time'], 'integer'],
            [['praise_sn', 'user_sn', 'audio_sn'], 'string', 'max' => 32],
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
            'user_sn' => 'User Sn',
            'audio_sn' => 'Audio Sn',
            'praise_level' => 'Praise Level',
            'is_delete' => 'Is Delete',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
