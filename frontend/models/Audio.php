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
 * @property integer $user_id
 * @property integer $text_id
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
            [['audio_name', 'audio_title', 'is_origin', 'user_id', 'text_id'], 'required'],
            [['is_origin', 'is_pub', 'user_id', 'text_id', 'is_del', 'create_time', 'update_time', 'audio_duration'], 'integer'],
            [['audio_sn'], 'string', 'max' => 32],
            [['audio_name'], 'string', 'max' => 64],
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
            'user_id' => 'User ID',
            'text_id' => 'Text ID',
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

    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id'=>'user_id']);
    }

    public function getText()
    {
        return $this->hasOne(Text::className(), ['text_id'=>'text_id']);
    }

    public function getStats()
    {
        return $this->hasOne(AudioStats::className(), ['audio_id'=>'audio_id']);
    }

    public function getCollect($userId=0)
    {
        if($userId>0)
        {
            return $this->hasMany(CollectAudio::className(), ['audio_id'=>'audio_id'])->where(['user_id'=>$userId]);
        }
        return $this->hasMany(CollectAudio::className(), ['audio_id'=>'audio_id']);
    }

    public function getPraise($userId=0)
    {
        if($userId>0)
        {
            return $this->hasMany(PraiseAudio::className(), ['audio_id'=>'audio_id'])->where(['user_id'=>$userId]);
        }
        return $this->hasMany(PraiseAudio::className(), ['audio_id'=>'audio_id']);
    }
}
