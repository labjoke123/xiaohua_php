<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%audio}}".
 *
 * @property integer $audio_id
 * @property string $audio_sn
 * @property string $audio_name
 * @property string $audio_title
 * @property integer $is_origin
 * @property integer $is_pub
 * @property string $user_sn
 * @property string $text_sn
 * @property integer $is_del
 * @property integer $create_time
 * @property integer $update_time
 * @property string $audio_type
 * @property integer $audio_duration
 * @property string $audio_icon
 * @property string $audio_url
 * @property string $audio_intro
 */
class Audio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%audio}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['audio_sn', 'audio_name', 'audio_title', 'is_origin', 'user_sn', 'text_sn', 'create_time', 'update_time'], 'required'],
            [['is_origin', 'is_pub', 'is_del', 'create_time', 'update_time', 'audio_duration'], 'integer'],
            [['audio_sn', 'text_sn'], 'string', 'max' => 32],
            [['audio_name', 'user_sn'], 'string', 'max' => 64],
            [['audio_title'], 'string', 'max' => 128],
            [['audio_type'], 'string', 'max' => 16],
            [['audio_icon', 'audio_url', 'audio_intro'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'audio_id' => 'Audio ID',
            'audio_sn' => 'Audio Sn',
            'audio_name' => 'Audio Name',
            'audio_title' => 'Audio Title',
            'is_origin' => 'Is Origin',
            'is_pub' => 'Is Pub',
            'user_sn' => 'User Sn',
            'text_sn' => 'Text Sn',
            'is_del' => 'Is Del',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'audio_type' => 'Audio Type',
            'audio_duration' => 'Audio Duration',
            'audio_icon' => 'Audio Icon',
            'audio_url' => 'Audio Url',
            'audio_intro' => 'Audio Intro',
        ];
    }
}
