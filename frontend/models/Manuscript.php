<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "joke_manuscript".
 *
 * @property integer $id
 * @property string $title
 * @property integer $is_origin
 * @property integer $is_pub
 * @property integer $is_del
 * @property integer $create_time
 * @property integer $update_time
 * @property string $author
 * @property string $labels
 * @property string $intro
 * @property string $content
 */
class Manuscript extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'joke_manuscript';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'is_origin', 'create_time', 'update_time'], 'required'],
            [['is_origin', 'is_pub', 'is_del', 'create_time', 'update_time'], 'integer'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 128],
            [['author'], 'string', 'max' => 32],
            [['labels'], 'string', 'max' => 16],
            [['intro'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '笑话标题',
            'is_origin' => '是否原创',
            'is_pub' => '发布状态',
            'is_del' => '删除状态',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
            'author' => '笑话作者',
            'labels' => '笑话标签',
            'intro' => '笑话简介',
            'content' => '笑话完整内容',
        ];
    }
}
