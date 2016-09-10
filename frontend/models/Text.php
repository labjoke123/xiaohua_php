<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%text}}".
 *
 * @property integer $text_id
 * @property string $text_sn
 * @property string $text_title
 * @property integer $is_origin
 * @property integer $is_pub
 * @property string $user_sn
 * @property integer $is_del
 * @property integer $create_time
 * @property integer $update_time
 * @property string $text_author
 * @property string $text_labels
 * @property string $text_intro
 * @property string $text_content
 */
class Text extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%text}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text_sn', 'text_title', 'is_origin', 'user_sn', 'create_time', 'update_time'], 'required'],
            [['is_origin', 'is_pub', 'is_del', 'create_time', 'update_time'], 'integer'],
            [['text_content'], 'string'],
            [['text_sn', 'text_author'], 'string', 'max' => 32],
            [['text_title', 'text_labels'], 'string', 'max' => 128],
            [['user_sn'], 'string', 'max' => 64],
            [['text_intro'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'text_id' => 'Text ID',
            'text_sn' => 'Text Sn',
            'text_title' => 'Text Title',
            'is_origin' => 'Is Origin',
            'is_pub' => 'Is Pub',
            'user_sn' => 'User Sn',
            'is_del' => 'Is Del',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'text_author' => 'Text Author',
            'text_labels' => 'Text Labels',
            'text_intro' => 'Text Intro',
            'text_content' => 'Text Content',
        ];
    }
}
