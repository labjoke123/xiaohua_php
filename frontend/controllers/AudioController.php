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

            $item['audio_id'] = $attributes['audio_id'];
            $item['audio_sn'] = $attributes['audio_sn'];
            $item['audio_name'] = $attributes['audio_name'];
            $item['audio_title'] = $attributes['audio_title'];
            $item['is_origin'] = $attributes['is_origin'];
            $item['audio_type'] = $attributes['audio_type'];
            $item['audio_duration'] = $attributes['audio_duration'];
            $item['audio_icon'] = $attributes['audio_icon'];
            $item['audio_url'] = $attributes['audio_url'];
            $item['audio_intro'] = $attributes['audio_intro'];

            $user = $audio->user->attributes;
            $item['user_id'] = $user['user_id'];

            $text = $audio->text->attributes;
            $item['text_id'] = $text['text_id'];

            $stats = $audio->stats->attributes;
            $item['play_num'] = $stats['play_num'];
            $item['praise_num'] = $stats['praise_num'];
            $item['collect_num'] = $stats['collect_num'];

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

            $item['audio_id'] = $attributes['audio_id'];
            $item['audio_sn'] = $attributes['audio_sn'];
            $item['audio_name'] = $attributes['audio_name'];
            $item['audio_title'] = $attributes['audio_title'];
            $item['is_origin'] = $attributes['is_origin'];
            $item['audio_type'] = $attributes['audio_type'];
            $item['audio_duration'] = $attributes['audio_duration'];
            $item['audio_icon'] = $attributes['audio_icon'];
            $item['audio_url'] = $attributes['audio_url'];
            $item['audio_intro'] = $attributes['audio_intro'];

            $user = $audio->user->attributes;
            $item['user_id'] = $user['user_id'];

            $text = $audio->text->attributes;
            $item['text_id'] = $text['text_id'];

            $stats = $audio->stats->attributes;
            $item['play_num'] = $stats['play_num'];
            $item['praise_num'] = $stats['praise_num'];
            $item['collect_num'] = $stats['collect_num'];

            $data['list'][] = $item;
        }

        $this->response($state, $data);
    }

    public function actionList()
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

            $item['audio_id'] = $attributes['audio_id'];
            $item['audio_sn'] = $attributes['audio_sn'];
            $item['audio_name'] = $attributes['audio_name'];
            $item['audio_title'] = $attributes['audio_title'];
            $item['is_origin'] = $attributes['is_origin'];
            $item['audio_type'] = $attributes['audio_type'];
            $item['audio_duration'] = $attributes['audio_duration'];
            $item['audio_icon'] = $attributes['audio_icon'];
            $item['audio_url'] = $attributes['audio_url'];
            $item['audio_intro'] = $attributes['audio_intro'];

            $user = $audio->user->attributes;
            $item['user_id'] = $user['user_id'];

            $text = $audio->text->attributes;
            $item['text_id'] = $text['text_id'];

            $stats = $audio->stats->attributes;
            $item['play_num'] = $stats['play_num'];
            $item['praise_num'] = $stats['praise_num'];
            $item['collect_num'] = $stats['collect_num'];

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

    	$data = $audio->attributes;

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
            $uploadFile = UploadedFile::getInstanceByName('file_audio');
            $saveName = 'uploads/'.time().rand();
            if ($uploadFile && $uploadFile->saveAs($saveName))
            {
                $audio = new Audio();
                $audio->audio_name = $_POST['audio_name'];
                $audio->audio_title = $_POST['audio_name'];
                $audio->is_origin = 1;
                $audio->is_pub = 1;
                $audio->user_id = $_POST['user_id'];
                $audio->text_id = $_POST['text_id'];
                $audio->audio_type = $_POST['audio_type'];
                $audio->audio_duration = $_POST['audio_duration'];
                $audio->audio_icon = $saveName;
                $audio->audio_intro = $_POST['audio_intro'];
                if($audio->save()) {
                    $data = $audio->attributes;
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

    public function actionPraise($userid, $id)
    {
        $praise = new PraiseAudio();
        $praise->user_id = $userid;
        $praise->audio_id = $id;
        $praise->praise_level = 'good';
        if($praise->save())
        {
            //TODO: praise num increase
            $state = array(
                'stateCode'=>'200',
                'stateMessage'=>'OK'
            );

            $data = array(
                'list'=>array()
            );
            $data['list'][] = $praise->attributes;

            $this->response($state, $data);
        } else {
            $state = array(
                'stateCode'=>'301',
                'stateMessage'=>'Create Fail'
            );

            $this->response($state);
        }
    }

    public function actionCollect($userid, $id)
    {
        $collect = new CollectAudio();
        $collect->user_id = $userid;
        $collect->audio_id = $id;
        if($collect->save())
        {
            //TODO: collect num increase
            $state = array(
                'stateCode'=>'200',
                'stateMessage'=>'OK'
            );

            $data = array(
                'list'=>array()
            );
            $data['list'][] = $collect->attributes;

            $this->response($state, $data);
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
        $comment = new CommentAudio();
        $comment->user_id = $userid;
        $comment->audio_id = $id;
        $comment->comment_content = $content;
        if($comment->save())
        {
            //TODO: comment num increase
            $state = array(
                'stateCode'=>'200',
                'stateMessage'=>'OK'
            );

            $data = array(
                'list'=>array()
            );
            $data['list'][] = $comment->attributes;

            $this->response($state, $data);
        } else {
            $state = array(
                'stateCode'=>'301',
                'stateMessage'=>'Create Fail'
            );

            $this->response($state);
        }
    }
}
