<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%text_stats}}".
 *
 * @property integer $count_id
 * @property string $count_sn
 * @property integer $text_id
 * @property integer $speak_num
 * @property integer $is_del
 * @property integer $create_time
 * @property integer $update_time
 */
class TextStats extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%text_stats}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['count_sn', 'text_id', 'speak_num'], 'required'],
            [['text_id', 'speak_num', 'is_del', 'create_time', 'update_time'], 'integer'],
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
            'text_id' => 'Text ID',
            'speak_num' => 'Speak Num',
            'is_del' => 'Is Del',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
