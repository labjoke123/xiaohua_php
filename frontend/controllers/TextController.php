<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Text;

class TextController extends \frontend\controllers\FrontController
{
    //TODO:remove this validation
    public $enableCsrfValidation = false;

    public function actionList()
    {
    	$texts = Text::find()->all();

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

    	foreach ($texts as $text) {
            $item = array();

            $attributes = $text->attributes;
            $item['textId'] = $attributes['text_id'];
            $item['textSn'] = $attributes['text_sn'];
            $item['textTitle'] = $attributes['text_title'];
            $item['isOrigin'] = $attributes['is_origin'];
            $item['isPub'] = $attributes['is_pub'];
            $item['userId'] = $attributes['user_id'];
            $item['textAuthor'] = $attributes['text_author'];
            $item['textLabels'] = $attributes['text_labels'];
            $item['textIntro'] = $attributes['text_intro'];
            $item['textContent'] = $attributes['text_content'];

    		$data['list'][] = $item;
    	}

    	$this->response($state, $data);
    }

    public function actionDetail()
    {
        $id = Yii::$app->request->post('id');

    	$text = Text::find()->where(['text_id'=>$id])->one();

		$state = array(
    		'stateCode'=>'200',
    		'stateMessage'=>'OK'
    	);

    	$attributes = $text->attributes;
        $item['textId'] = $attributes['text_id'];
        $item['textSn'] = $attributes['text_sn'];
        $item['textTitle'] = $attributes['text_title'];
        $item['isOrigin'] = $attributes['is_origin'];
        $item['isPub'] = $attributes['is_pub'];
        $item['userId'] = $attributes['user_id'];
        $item['textAuthor'] = $attributes['text_author'];
        $item['textLabels'] = $attributes['text_labels'];
        $item['textIntro'] = $attributes['text_intro'];
        $item['textContent'] = $attributes['text_content'];

        $item['audios'] = array();
        $audios = $text->audios;
        foreach ($audios as $audio) {
            $itemAudio = array();
            $attrsAudio = $audio->attributes;
            $itemAudio['audioId'] = $attrsAudio['audio_id'];
            $itemAudio['audioSn'] = $attrsAudio['audio_sn'];
            $itemAudio['audioName'] = $attrsAudio['audio_name'];
            $itemAudio['audioTitle'] = $attrsAudio['audio_title'];
            $itemAudio['isOrigin'] = $attrsAudio['is_origin'];
            $itemAudio['audioType'] = $attrsAudio['audio_type'];
            $itemAudio['audioDuration'] = $attrsAudio['audio_duration'];
            $itemAudio['audioIcon'] = $attrsAudio['audio_icon'];
            $itemAudio['audioUrl'] = $attrsAudio['audio_url'];
            $itemAudio['audioIntro'] = $attrsAudio['audio_intro'];
            $item['audios'][] = $itemAudio;
        }

        $data = $item;

    	$this->response($state, $data);
    }
}
