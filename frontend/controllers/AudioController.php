<?php

namespace frontend\controllers;

use frontend\models\Audio;

class AudioController extends \frontend\controllers\FrontController
{
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

    	$resArray = array(
    		'state'=>$state,
    		'data'=>$data
    	);

    	$this->outputDataFormat($resArray);
    }

    public function actionDetail($id)
    {
    	$audio = Audio::find()->where(['id'=>$id])->one();

		$state = array(
    		'stateCode'=>'200',
    		'stateMessage'=>'OK'
    	);

    	$data = $audio->attributes;

    	$resArray = array(
    		'state'=>$state,
    		'data'=>$data
    	);

    	$this->outputDataFormat($resArray);
    }

    public function actionUpload()
    {

    }

    public function actionPraise($userid, $id)
    {

    }

    public function actionCollect($userid, $id)
    {

    }

    public function actionComment($userid, $id)
    {

    }
}
