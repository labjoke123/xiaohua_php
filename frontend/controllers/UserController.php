<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Audio;
use frontend\models\User;
use frontend\models\PraiseAudio;
use frontend\models\CollectAudio;
use frontend\models\CommentAudio;
use frontend\models\SystemMessage;

class UserController extends \frontend\controllers\FrontController
{
    //TODO:remove this validation
    public $enableCsrfValidation = false;

    public function actionPublish()
    {
        $userId = Yii::$app->request->post('userId');

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

            $data['list'][] = $item;
        }

        $this->response($state, $data);
    }

    public function actionDetail()
    {
        $userId = Yii::$app->request->post('userId');
        $user = User::find()->where(['user_id'=>$userId])->one();

        $state = array(
            'stateCode'=>'200',
            'stateMessage'=>'OK'
        );

        $attributes = $user->attributes;
        $item['userId'] = $attributes['user_id'];
        $item['userName'] = $attributes['user_name'];
        $item['email'] = $attributes['email'];
        $item['age'] = $attributes['age'];
        $item['gender'] = $attributes['gender'];
        $item['profile'] = $attributes['profile'];
        $item['portrait'] = $attributes['portrait'];
        $item['address'] = $attributes['address'];
        $data = $item;

        $this->response($state, $data);
    }

    public function actionEdit()
    {
        $state = array(
            'stateCode'=>'200',
            'stateMessage'=>'OK'
        );

        $this->response($state);
    }

    public function actionPortrait()
    {
        $state = array(
            'stateCode'=>'200',
            'stateMessage'=>'OK'
        );

        $data['portrait'] = 'http://image.baidu.com/search/detail?ct=503316480&z=undefined&tn=baiduimagedetail&ipn=d&word=%E5%AE%A0%E7%89%A9&step_word=&ie=utf-8&in=&cl=2&lm=-1&st=undefined&cs=21385237,1665284751&os=268713017,2466284082&simid=0,0&pn=2&rn=1&di=204007309110&ln=1981&fr=&fmq=1476806980541_R&fm=&ic=undefined&s=undefined&se=&sme=&tab=0&width=&height=&face=undefined&is=0,0&istype=0&ist=&jit=&bdtype=0&adpicid=0&pi=0&gsm=0&objurl=http%3A%2F%2Fh.hiphotos.baidu.com%2Fzhidao%2Fpic%2Fitem%2F6d81800a19d8bc3ed69473cb848ba61ea8d34516.jpg&rpstart=0&rpnum=0&adpicid=0';

        $this->response($state, $data);
    }

    public function actionCollects()
    {
        $userId = Yii::$app->request->post('userId');
        $collects = CollectAudio::findAll(['user_id'=>$userId]);

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

        foreach ($collects as $collect) {
            $attributes = $collect->audio->attributes;
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
            $data['list'][] = $item;
        }

        $this->response($state, $data);
    }

    public function actionComments()
    {
        $userId = Yii::$app->request->post('userId');
        $comments = CommentAudio::findAll(['user_id'=>$userId]);

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

        foreach ($comments as $comment) {
            $attributes = $comment->audio->attributes;
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
            $data['list'][] = $item;
        }

        $this->response($state, $data);
    }

    public function actionMesses()
    {
        $userId = Yii::$app->request->post('userId');
        $messes = SystemMessage::findAll(['target_user_id'=>$userId, 'trigger_user_id'=>0]);

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

        foreach ($messes as $mess) {
            $attributes = $mess->attributes;
            $item['trigger'] = $attributes['trigger_user_id'];
            $item['type'] = $attributes['mess_type'];
            $item['content'] = $attributes['mess_content'];
            $data['list'][] = $item;
        }

        $this->response($state, $data);
    }
}
