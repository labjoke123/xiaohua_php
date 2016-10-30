<?php

namespace frontend\controllers;

use Yii;
use yii\web\UploadedFile;

use frontend\models\Audio;
use frontend\models\PraiseAudio;
use frontend\models\CollectAudio;
use frontend\models\CommentAudio;

class AudioController extends \frontend\controllers\FrontController
{
    //TODO:remove this validation
    public $enableCsrfValidation = false;

    public function actionNew()
    {
        $audios = Audio::find()->all();

        $state = array(
            'stateCode'=>'200',
            'stateMessage'=>'OK'
        );

        $data = array(
            'total'=>'100',
            'pageNum'=>'1',
            'pageSize'=>'20',
            'list'=>array()
        );

        foreach ($audios as $audio) {
            $item = array();

            $attributes = $audio->attributes;

            $item['audioId'] = $attributes['audio_id'];
            $item['audioSn'] = $attributes['audio_sn'];
            $item['createTime'] = $attributes['create_time'];
            $item['audioName'] = $attributes['audio_name'];
            $item['audioTitle'] = $attributes['audio_title'];
            $item['isOrigin'] = $attributes['is_origin'];
            $item['audioType'] = $attributes['audio_type'];
            $item['audioDuration'] = $attributes['audio_duration'];
            $item['audioIcon'] = $attributes['audio_icon'];
            $item['audioUrl'] = $attributes['audio_url'];
            $item['audioIntro'] = $attributes['audio_intro'];

            $user = $audio->user->attributes;
            $item['userId'] = $user['user_id'];
            $item['userName'] = $user['user_name'];
            $item['portrait'] = $user['portrait'];

            $text = $audio->text->attributes;
            $item['textId'] = $text['text_id'];

            if($audio->stats)
            {
                $audioStats = $audio->stats->attributes;
                $item['playNum'] = $audioStats['play_num'];
                $item['praiseNum'] = $audioStats['praise_num'];
                $item['collectNum'] = $audioStats['collect_num'];
            }

            if($audio->text->stats)
            {
                $textStatus = $audio->text->stats->attributes;
                $item['speakNum'] = $textStatus['speak_num'];
            }

            $data['list'][] = $item;
        }

        $this->response($state, $data);
    }

    public function actionHot()
    {
        $audios = Audio::find()->all();

        $state = array(
            'stateCode'=>'200',
            'stateMessage'=>'OK'
        );

        $data = array(
            'total'=>'100',
            'pageNum'=>'1',
            'pageSize'=>'20',
            'list'=>array()
        );

        foreach ($audios as $audio) {
            $item = array();

            $attributes = $audio->attributes;

            $item['audioId'] = $attributes['audio_id'];
            $item['audioSn'] = $attributes['audio_sn'];
            $item['createTime'] = $attributes['create_time'];
            $item['audioName'] = $attributes['audio_name'];
            $item['audioTitle'] = $attributes['audio_title'];
            $item['isOrigin'] = $attributes['is_origin'];
            $item['audioType'] = $attributes['audio_type'];
            $item['audioDuration'] = $attributes['audio_duration'];
            $item['audioIcon'] = $attributes['audio_icon'];
            $item['audioUrl'] = $attributes['audio_url'];
            $item['audioIntro'] = $attributes['audio_intro'];

            $user = $audio->user->attributes;
            $item['userId'] = $user['user_id'];

            $text = $audio->text->attributes;
            $item['textId'] = $text['text_id'];

            if($audio->stats)
            {
                $audioStats = $audio->stats->attributes;
                $item['playNum'] = $audioStats['play_num'];
                $item['praiseNum'] = $audioStats['praise_num'];
                $item['collectNum'] = $audioStats['collect_num'];
            }

            if($audio->text->stats)
            {
                $textStatus = $audio->text->stats->attributes;
                $item['speakNum'] = $textStatus['speak_num'];
            }

            $data['list'][] = $item;
        }

        $this->response($state, $data);
    }

    public function actionDetail($id)
    {
    	$audio = Audio::find()->where(['audio_id'=>$id])->one();

		$state = array(
    		'stateCode'=>'200',
    		'stateMessage'=>'OK'
    	);

    	$attributes = $audio->attributes;
        $item['audioId'] = $attributes['audio_id'];
        $item['audioSn'] = $attributes['audio_sn'];
        $item['audioName'] = $attributes['audio_name'];
        $item['audioTitle'] = $attributes['audio_title'];
        $item['isOrigin'] = $attributes['is_origin'];
        $item['audioType'] = $attributes['audio_type'];
        $item['audioDuration'] = $attributes['audio_duration'];
        $item['audioIcon'] = $attributes['audio_icon'];
        $item['audioUrl'] = $attributes['audio_url'];
        $item['audioIntro'] = $attributes['audio_intro'];

        $user = $audio->user->attributes;
        $item['userId'] = $user['user_id'];

        $text = $audio->text->attributes;
        $item['textId'] = $text['text_id'];

        if($audio->stats)
        {
            $stats = $audio->stats->attributes;
            $item['playNum'] = $stats['play_num'];
            $item['praiseNum'] = $stats['praise_num'];
            $item['collectNum'] = $stats['collect_num'];
        }

        $data = $item;

    	$this->response($state, $data);
    }

    public function actionUpload()
    {
        $state = array(
            'stateCode'=>'200',
            'stateMessage'=>'OK'
        );
        $data = array();
        if (Yii::$app->request->isPost)
        {
            $uploadFile = UploadedFile::getInstanceByName('audio');
            $saveName = 'uploads/'.time().rand();
            if ($uploadFile && $uploadFile->saveAs($saveName))
            {
                $audio = new Audio();
                $audio->audio_name = isset($_POST['name'])?$_POST['name']:'name';
                $audio->audio_title = isset($_POST['name'])?$_POST['name']:'title';
                $audio->is_origin = 1;
                $audio->is_pub = 1;
                $audio->user_id = $_POST['userId'];
                $audio->text_id = isset($_POST['textId'])?$_POST['textId']:0;
                $audio->audio_type = isset($_POST['type'])?$_POST['type']:'amr';
                $audio->audio_duration = isset($_POST['duration'])?$_POST['duration']:0;
                $audio->audio_icon = $saveName;
                $audio->audio_intro = isset($_POST['intro'])?$_POST['intro']:'intro';
                if($audio->save()) {
                    $attributes = $audio->attributes;
                    $item['audioId'] = $attributes['audio_id'];
                    $item['audioSn'] = $attributes['audio_sn'];
                    $item['audioName'] = $attributes['audio_name'];
                    $item['audioTitle'] = $attributes['audio_title'];
                    $item['isOrigin'] = $attributes['is_origin'];
                    $item['audioType'] = $attributes['audio_type'];
                    $item['audioDuration'] = $attributes['audio_duration'];
                    $item['audioIcon'] = $attributes['audio_icon'];
                    $item['audioUrl'] = $attributes['audio_url'];
                    $item['audioIntro'] = $attributes['audio_intro'];
                    $data = $item;
                } else {
                    $state = array(
                        'stateCode'=>'303',
                        'stateMessage'=>'Data Invalid'
                    );
                }
            } else {
                $state = array(
                    'stateCode'=>'302',
                    'stateMessage'=>'Upload Fail'
                );
            }
        } else {
            $state = array(
                'stateCode'=>'301',
                'stateMessage'=>'Please Post'
            );
        }

        $this->response($state, $data);
    }

    public function actionPlay()
    {
        $userId = Yii::$app->request->post('userId');
        $id = Yii::$app->request->post('id');

        $state = array(
            'stateCode'=>'200',
            'stateMessage'=>'OK'
        );

        //TODO:修改播放次数

        $this->response($state);
    }

    public function actionPraise()
    {
        $userId = Yii::$app->request->post('userId');
        $id = Yii::$app->request->post('id');

        $praise = new PraiseAudio();
        $praise->user_id = $userId;
        $praise->audio_id = $id;
        $praise->praise_level = 'good';
        if($praise->save())
        {
            //TODO: praise num increase
            $state = array(
                'stateCode'=>'200',
                'stateMessage'=>'OK'
            );
            $this->response($state);
        } else {
            $state = array(
                'stateCode'=>'301',
                'stateMessage'=>'Create Fail'
            );
            $this->response($state);
        }
    }

    public function actionCollect()
    {
        $userId = Yii::$app->request->post('userId');
        $id = Yii::$app->request->post('id');

        $collect = new CollectAudio();
        $collect->user_id = $userId;
        $collect->audio_id = $id;
        if($collect->save())
        {
            //TODO: collect num increase
            $state = array(
                'stateCode'=>'200',
                'stateMessage'=>'OK'
            );
            $this->response($state);
        } else {
            $state = array(
                'stateCode'=>'301',
                'stateMessage'=>'Create Fail'
            );
            $this->response($state);
        }
    }

    public function actionDiscollect()
    {
        $userId = Yii::$app->request->post('userId');
        $id = Yii::$app->request->post('id');

        $collect = new CollectAudio();
        $collect->user_id = $userId;
        $collect->audio_id = $id;
        if($collect->save())
        {
            //TODO: collect num increase
            $state = array(
                'stateCode'=>'200',
                'stateMessage'=>'OK'
            );
            $this->response($state);
        } else {
            $state = array(
                'stateCode'=>'301',
                'stateMessage'=>'Create Fail'
            );
            $this->response($state);
        }
    }

    public function actionComment($userid, $id, $content)
    {
        $userId = Yii::$app->request->post('userId');
        $id = Yii::$app->request->post('id');
        $content = Yii::$app->request->post('content');

        $comment = new CommentAudio();
        $comment->user_id = $userId;
        $comment->audio_id = $id;
        $comment->comment_content = $content;
        if($comment->save())
        {
            //TODO: comment num increase
            $state = array(
                'stateCode'=>'200',
                'stateMessage'=>'OK'
            );
            $this->response($state);
        } else {
            $state = array(
                'stateCode'=>'301',
                'stateMessage'=>'Create Fail'
            );
            $this->response($state);
        }
    }
}
