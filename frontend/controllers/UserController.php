<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Audio;
use frontend\models\User;
use frontend\models\PraiseAudio;
use frontend\models\CollectAudio;
use frontend\models\CommentAudio;
use frontend\models\SystemMessage;
use frontend\models\ThirdUser;

class UserController extends \frontend\controllers\FrontController
{
    //TODO:remove this validation
    public $enableCsrfValidation = false;

    public function actionPublish()
    {
        $data = $this->parseContent();

        $userId = $data->userId;
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
                $textStats = $audio->text->stats->attributes;
                $item['speakNum'] = $textStats['speak_num'];
            }

            $data['list'][] = $item;
        }

        $this->response($state, $data);
    }

    public function actionDetail()
    {
        $data = $this->parseContent();

        $userId = $data->userId;
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
        $item['phone'] = $attributes['phone'];
        $item['type'] = $attributes['type'];
        $data = $item;

        $this->response($state, $data);
    }

    public function actionEdit()
    {
        $data = $this->parseContent();

        $userId = $data->userId;
        $userName = isset($data->userName)?$data->userName:false;
        $age = isset($data->age)?$data->age:false;
        $gender = isset($data->gender)?$data->gender:false;
        $profile = isset($data->profile)?$data->profile:false;

        $state = array(
            'stateCode'=>'200',
            'stateMessage'=>'OK'
        );

        $user = User::find()->where(['user_id'=>$userId])->one();
        if($userName) $user->user_name = $userName;
        if($age) $user->age = $age;
        if($gender) $user->gender = $gender;
        if($profile) $user->profile = $profile;

        if(!$user->save())
        {
            $state = array(
                'stateCode'=>'303',
                'stateMessage'=>'no is invalid'
            );
        }

        $this->response($state);
    }

    public function actionBind()
    {
        $data = $this->parseContent();

        $userId = $data->userId;
        $phone = $data->phone;

        $state = array(
            'stateCode'=>'200',
            'stateMessage'=>'OK'
        );

        $user = User::find()->where(['user_id'=>$userId])->one();
        $user->phone = $phone;
        if(!$user->save())
        {
            $state = array(
                'stateCode'=>'303',
                'stateMessage'=>'no is invalid'
            );
        }

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
        $data = $this->parseContent();

        $userId = $data->userId;
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
            $item['createTime'] = $attributes['create_time'];
            $item['audioName'] = $attributes['audio_name'];
            $item['audioTitle'] = $attributes['audio_title'];
            $item['isOrigin'] = $attributes['is_origin'];
            $item['audioType'] = $attributes['audio_type'];
            $item['audioDuration'] = $attributes['audio_duration'];
            $item['audioIcon'] = $attributes['audio_icon'];
            $item['audioUrl'] = $attributes['audio_url'];
            $item['audioIntro'] = $attributes['audio_intro'];

            $user = $collect->audio->user->attributes;
            $item['userId'] = $user['user_id'];
            $item['userSn'] = $user['user_sn'];
            $item['userName'] = $user['user_name'];
            $item['portrait'] = $user['portrait'];

            $text = $collect->audio->text->attributes;
            $item['textId'] = $text['text_id'];
            $item['textSn'] = $text['text_sn'];
            $item['textLabels'] = $text['text_labels'];
            $item['textIntro'] = $text['text_intro'];
            $item['textContent'] = $text['text_content'];

            if($collect->audio->stats){
                $audioStats = $collect->audio->stats->attributes;
                $item['playNum'] = $audioStats['play_num'];
                $item['praiseNum'] = $audioStats['praise_num'];
                $item['collectNum'] = $audioStats['collect_num'];
            }

            if($collect->audio->text->stats){
                $textStats = $collect->audio->text->stats->attributes;
                $item['speakNum'] = $textStats['speak_num'];
            }

            $data['list'][] = $item;
        }

        $this->response($state, $data);
    }

    public function actionComments()
    {
        $data = $this->parseContent();

        $userId = $data->userId;
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
        $data = $this->parseContent();

        $userId = $data->userId;
        $messes = SystemMessage::findAll(['target_user_id'=>$userId]);

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

            $item['createTime'] = $attributes['create_time'];
            $item['type'] = $attributes['mess_type'];
            $item['content'] = $attributes['mess_content'];

            $trigger = $mess->trigger->attributes;
            $item['triggerUserId'] = $trigger['user_id'];
            $item['triggerUserSn'] = $trigger['user_sn'];
            $item['triggerUserName'] = $trigger['user_name'];
            $item['triggerPortrait'] = $trigger['portrait'];

            $item['curTime'] = time();

            $data['list'][] = $item;
        }

        $this->response($state, $data);
    }

    public function actionThirdreg()
    {
        $data = $this->parseContent();

        $state = array(
            'stateCode'=>'200',
            'stateMessage'=>'OK'
        );

        $type = $data->type;
        $identifier = $data->identifier;
        $info = $data->info;

        $hasReg = false;
        $third_user_id = 0;

        $thirdUser = ThirdUser::find()->where(['type'=>$type,'identifier'=>$identifier])->one();
        if($thirdUser)
        {
            $thirdUserAttr = $thirdUser->attributes;
            $third_user_id = $thirdUserAttr['third_user_id'];
            $user = User::find()->where(['third_user_id'=>$third_user_id,'type'=>$type]);
            if($user)
            {
                $hasReg = true;
            }
        }
        else
        {
            $thirdUser = new ThirdUser();
            $thirdUser->type = $type;
            $thirdUser->identifier = $identifier;
            $thirdUser->user_info = json_encode($info);
            $thirdUser->third_user_sn = md5(rand().time().$type.$identifier);
            if(!$thirdUser->save())
            {
                $state = array(
                    'stateCode'=>'303',
                    'stateMessage'=>'no is invalid'
                );
                return $this->response($state);
            }

            $thirdUser = ThirdUser::find()->where(['type'=>$type,'identifier'=>$identifier])->one();
            $thirdUserAttr = $thirdUser->attributes;
            $third_user_id = $thirdUserAttr['third_user_id'];
        }

        if(!$hasReg)
        {
            $user = new User();
            $user->user_name = isset($info->userName)?$info->userName:'';
            $user->email = isset($info->email)?$info->email:'';
            $user->age = isset($info->age)?$info->age:0;
            $user->gender = isset($info->gender)?$info->gender:0;
            $user->profile = isset($info->profile)?$info->profile:'';
            $user->portrait = isset($info->portrait)?$info->portrait:'';
            $user->address = isset($info->address)?$info->address:'';
            $user->phone = isset($info->phone)?$info->phone:0;
            $user->type = $type;
            $user->third_user_id = $third_user_id;
            $user->user_sn = md5(rand().time().$type.$identifier);

            if(!$user->save())
            {
                $state = array(
                    'stateCode'=>'303',
                    'stateMessage'=>'no is invalid'
                );
                return $this->response($state);
            }
        }

        $user = User::find()->where(['type'=>$type,'third_user_id'=>$third_user_id])->one();

        $attributes = $user->attributes;
        $item['userId'] = $attributes['user_id'];
        $item['userName'] = $attributes['user_name'];
        $item['email'] = $attributes['email'];
        $item['age'] = $attributes['age'];
        $item['gender'] = $attributes['gender'];
        $item['profile'] = $attributes['profile'];
        $item['portrait'] = $attributes['portrait'];
        $item['address'] = $attributes['address'];
        $item['phone'] = $attributes['phone'];
        $item['type'] = $attributes['type'];
        $data = $item;

        $this->response($state, $data);
    }
}
