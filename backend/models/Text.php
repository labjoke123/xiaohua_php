<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%text}}".
 *
 * @property integer $text_id
 * @property string $text_sn
 * @property string $text_title
 * @property integer $is_origin
 * @property integer $is_pub
 * @property integer $user_id
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
            [['text_sn', 'text_title', 'is_origin', 'user_id', 'create_time', 'update_time'], 'required'],
            [['is_origin', 'is_pub', 'user_id', 'is_del', 'create_time', 'update_time'], 'integer'],
            [['text_content'], 'string'],
            [['text_sn', 'text_author'], 'string', 'max' => 32],
            [['text_title', 'text_labels'], 'string', 'max' => 128],
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
            'text_title' => '笑话标题',
            'is_origin' => '是否原创',
            'is_pub' => '发布状态',
            'user_id' => 'User ID',
            'is_del' => '删除状态',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
            'text_author' => '笑话作者',
            'text_labels' => '笑话标签',
            'text_intro' => '笑话简介',
            'text_content' => '笑话完整内容',
        ];
    }
}
