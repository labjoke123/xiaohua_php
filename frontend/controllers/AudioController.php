<?php

namespace frontend\controllers;

use Yii;
use yii\web\UploadedFile;

use frontend\models\Audio;
use frontend\models\PraiseAudio;
use frontend\models\CollectAudio;
use frontend\models\CommentAudio;
use frontend\models\ShareAudio;

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
            $item['userSn'] = $user['user_sn'];
            $item['userName'] = $user['user_name'];
            $item['portrait'] = $user['portrait'];

            $text = $audio->text->attributes;
            $item['textId'] = $text['text_id'];
            $item['textSn'] = $text['text_sn'];
            $item['textContent'] = $text['text_content'];

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
        $data = $this->parseContent();
        $userId = isset($data->userId)?$data->userId:0;
        $page = isset($data->page)?$data->page:1;
        $size = isset($data->size)?$data->size:1;
        $offset = ($page-1)*$size;

        $count = Audio::find()->count();
        $audios = Audio::find()->offset($offset)->limit($size)->all();

        $state = array(
            'stateCode'=>'200',
            'stateMessage'=>'OK'
        );

        $data = array(
            'total'=>$count,
            'pageNum'=>$page,
            'pageSize'=>$size,
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
            $item['userSn'] = $user['user_sn'];
            $item['userName'] = $user['user_name'];
            $item['portrait'] = $user['portrait'];

            $text = $audio->text->attributes;
            $item['textId'] = $text['text_id'];
            $item['textSn'] = $text['text_sn'];
            $item['textContent'] = $text['text_content'];

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
                $audio->audio_sn = time()."_".rand();
                $audio->audio_name = isset($_POST['name'])?$_POST['name']:'name';
                $audio->audio_title = isset($_POST['name'])?$_POST['name']:'title';
                $audio->is_origin = 1;
                $audio->is_pub = 1;
                $audio->user_id = $_POST['userId'];
                $audio->text_id = isset($_POST['textId'])?$_POST['textId']:0;
                $audio->audio_type = isset($_POST['type'])?$_POST['type']:'amr';
                $audio->audio_duration = isset($_POST['duration'])?$_POST['duration']:0;
                $audio->audio_icon = "";
                $audio->audio_intro = isset($_POST['intro'])?$_POST['intro']:'intro';
                $audio->audio_url = $saveName;

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
        $data = $this->parseContent();

        $userId = $data->userId;
        $audioId = $data->audioId;

        $state = array(
            'stateCode'=>'200',
            'stateMessage'=>'OK'
        );

        //TODO:修改播放次数

        $this->response($state);
    }

    public function actionPraise()
    {
        $data = $this->parseContent();

        $userId = $data->userId;
        $audioId = $data->audioId;

        $state = array(
            'stateCode'=>'200',
            'stateMessage'=>'OK'
        );

        $praise = PraiseAudio::find()->where(['user_id'=>$userId,'audio_id'=>$audioId])->one();

        if(!$praise)
        {
            $praise = new PraiseAudio();
            $praise->user_id = $userId;
            $praise->audio_id = $audioId;
            $praise->praise_level = 'good';
            $praise->praise_sn = md5(rand().time().$userId.$audioId);
        }
        $praise->is_delete = 0;

        if(!$praise->save())
        {
            //TODO: collect num increase
            $state = array(
                'stateCode'=>'301',
                'stateMessage'=>'Create Fail'
            );
        }

        $this->response($state);
    }

    public function actionDispraise()
    {
        $data = $this->parseContent();

        $userId = $data->userId;
        $audioId = $data->audioId;

        $state = array(
            'stateCode'=>'200',
            'stateMessage'=>'OK'
        );

        $praise = PraiseAudio::find()->where(['user_id'=>$userId,'audio_id'=>$audioId])->one();

        if($praise)
        {
            $praise->is_delete = 1;
            if(!$praise->save())
            {
                //TODO: collect num increase
                $state = array(
                    'stateCode'=>'301',
                    'stateMessage'=>'Create Fail'
                );
            }
        }

        $this->response($state);
    }

    public function actionCollect()
    {
        $data = $this->parseContent();

        $userId = $data->userId;
        $audioId = $data->audioId;

        $state = array(
            'stateCode'=>'200',
            'stateMessage'=>'OK'
        );

        $collect = CollectAudio::find()->where(['user_id'=>$userId,'audio_id'=>$audioId])->one();

        if(!$collect)
        {
            $collect = new CollectAudio();
            $collect->user_id = $userId;
            $collect->audio_id = $audioId;
            $collect->collect_sn = md5(rand().time().$userId.$audioId);
        }
        $collect->is_delete = 0;

        if(!$collect->save())
        {
            //TODO: collect num increase
            $state = array(
                'stateCode'=>'301',
                'stateMessage'=>'Create Fail'
            );
        }

        $this->response($state);
    }

    public function actionDiscollect()
    {
        $data = $this->parseContent();

        $userId = $data->userId;
        $audioId = $data->audioId;

        $state = array(
            'stateCode'=>'200',
            'stateMessage'=>'OK'
        );

        $collect = CollectAudio::find()->where(['user_id'=>$userId,'audio_id'=>$audioId])->one();

        if($collect)
        {
            $collect->is_delete = 1;
            if(!$collect->save())
            {
                $state = array(
                    'stateCode'=>'301',
                    'stateMessage'=>'Create Fail'
                );
            }
        }

        $this->response($state);
    }

    public function actionShare()
    {
        $data = $this->parseContent();

        $userId = $data->userId;
        $audioId = $data->audioId;

        $state = array(
            'stateCode'=>'200',
            'stateMessage'=>'OK'
        );

        $share = ShareAudio::find()->where(['user_id'=>$userId,'audio_id'=>$audioId])->one();

        if(!$share)
        {
            $share = new ShareAudio();
            $share->user_id = $userId;
            $share->audio_id = $audioId;
            $share->is_delete = 0;
            $share->share_sn = md5(rand().time().$userId.$audioId);

            if(!$share->save())
            {
                //TODO: collect num increase
                $state = array(
                    'stateCode'=>'301',
                    'stateMessage'=>'Create Fail'
                );
            }
        }

        $this->response($state);
    }
}
