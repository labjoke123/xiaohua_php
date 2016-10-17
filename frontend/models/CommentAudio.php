<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%comment_audio}}".
 *
 * @property integer $comment_id
 * @property string $comment_sn
 * @property integer $user_id
 * @property integer $audio_id
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
            [['user_id', 'audio_id', 'comment_content'], 'required'],
            [['user_id', 'audio_id'], 'integer'],
            [['comment_content'], 'string'],
            [['comment_sn'], 'string', 'max' => 32],
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
            'user_id' => 'User ID',
            'audio_id' => 'Audio ID',
            'comment_content' => 'Comment Content',
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
