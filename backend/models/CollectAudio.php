<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%collect_audio}}".
 *
 * @property integer $collect_id
 * @property string $collect_sn
 * @property string $user_sn
 * @property string $audio_sn
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
            [['collect_sn', 'user_sn', 'audio_sn', 'is_delete', 'create_time', 'update_time'], 'required'],
            [['is_delete', 'create_time', 'update_time'], 'integer'],
            [['collect_sn', 'user_sn', 'audio_sn'], 'string', 'max' => 32],
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
            'user_sn' => 'User Sn',
            'audio_sn' => 'Audio Sn',
            'is_delete' => 'Is Delete',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
