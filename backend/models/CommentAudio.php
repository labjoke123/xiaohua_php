<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%comment_audio}}".
 *
 * @property integer $comment_id
 * @property string $comment_sn
 * @property string $user_sn
 * @property string $audio_sn
 * @property string $comment_content
 * @property integer $is_delete
 * @property integer $create_time
 * @property integer $update_time
 */
class CommentAudio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%comment_audio}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comment_sn', 'user_sn', 'audio_sn', 'comment_content', 'is_delete', 'create_time', 'update_time'], 'required'],
            [['comment_content'], 'string'],
            [['is_delete', 'create_time', 'update_time'], 'integer'],
            [['comment_sn', 'user_sn', 'audio_sn'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'comment_id' => 'Comment ID',
            'comment_sn' => 'Comment Sn',
            'user_sn' => 'User Sn',
            'audio_sn' => 'Audio Sn',
            'comment_content' => 'Comment Content',
            'is_delete' => 'Is Delete',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
