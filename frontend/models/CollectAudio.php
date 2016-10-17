<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%collect_audio}}".
 *
 * @property integer $collect_id
 * @property string $collect_sn
 * @property integer $user_id
 * @property integer $audio_id
 * @property integer $is_delete
 * @property integer $create_time
 * @property integer $update_time
 */
class CollectAudio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%collect_audio}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'audio_id'], 'required'],
            [['user_id', 'audio_id'], 'integer'],
            [['collect_sn'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'collect_id' => 'Collect ID',
            'collect_sn' => 'Collect Sn',
            'user_id' => 'User ID',
            'audio_id' => 'Audio ID',
            'is_delete' => 'Is Delete',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }

    public function getAudio()
    {
        return $this->hasOne(Audio::className(), ['audio_id'=>'audio_id']);
    }
}
