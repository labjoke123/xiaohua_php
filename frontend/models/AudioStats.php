<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%audio_stats}}".
 *
 * @property integer $count_id
 * @property string $count_sn
 * @property integer $audio_id
 * @property integer $play_num
 * @property integer $praise_num
 * @property integer $collect_num
 * @property integer $is_delete
 * @property integer $create_time
 * @property integer $update_time
 */
class AudioStats extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%audio_stats}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['count_sn', 'audio_id', 'play_num', 'praise_num', 'collect_num'], 'required'],
            [['audio_id', 'play_num', 'praise_num', 'collect_num', 'is_delete', 'create_time', 'update_time'], 'integer'],
            [['count_sn'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'count_id' => 'Count ID',
            'count_sn' => 'Count Sn',
            'audio_id' => 'Audio ID',
            'play_num' => 'Play Num',
            'praise_num' => 'Praise Num',
            'collect_num' => 'Collect Num',
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
