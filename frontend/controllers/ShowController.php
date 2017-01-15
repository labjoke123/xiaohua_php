<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Audio;

class ShowController extends \frontend\controllers\FrontController
{
    public function actionAudio()
    {
    	$audioId = Yii::$app->request->get('audioId');
    	$audio = Audio::find()->where(['audio_id'=>$audioId])->one();

        return $this->render('audio', ['audio'=>$audio]);
    }

}
