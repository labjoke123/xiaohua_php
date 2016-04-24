<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%audio}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property integer $is_pub
 * @property integer $is_del
 * @property integer $create_time
 * @property integer $update_time
 * @property string $type
 * @property integer $duration
 * @property string $icon
 * @property string $url
 * @property string $desc
 * @property string $content
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
            [['name', 'title', 'create_time', 'update_time'], 'required'],
            [['is_pub', 'is_del', 'create_time', 'update_time', 'duration'], 'integer'],
            [['content'], 'string'],
            [['name'], 'string', 'max' => 64],
            [['title'], 'string', 'max' => 128],
            [['type'], 'string', 'max' => 16],
            [['icon', 'url', 'desc'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '音频名称',
            'title' => '音频Title',
            'is_pub' => '发布状态',
            'is_del' => 'Is Del',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
            'type' => '音频格式（后缀）',
            'duration' => '音频时长',
            'icon' => '音频icon',
            'url' => '音频地址',
            'desc' => '音频描述',
            'content' => '笑话文字内容',
        ];
    }
}
