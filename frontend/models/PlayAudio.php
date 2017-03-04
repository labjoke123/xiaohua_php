<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%play_audio}}".
 *
 * @property integer $play_id
 * @property string $play_sn
 * @property integer $user_id
 * @property integer $audio_id
 * @property integer $is_delete
 * @property integer $create_time
 * @property integer $update_time
 */
class PlayAudio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%play_audio}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['play_sn', 'user_id', 'audio_id'], 'required'],
            [['user_id', 'audio_id', 'is_delete', 'create_time', 'update_time'], 'integer'],
            [['play_sn'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'play_id' => 'Play ID',
            'play_sn' => 'Play Sn',
            'user_id' => 'User ID',
            'audio_id' => 'Audio ID',
            'is_delete' => 'Is Delete',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
