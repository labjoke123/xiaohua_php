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
    		$data['list'][] = $audio->attributes;
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
