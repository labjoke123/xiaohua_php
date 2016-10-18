<?php

namespace frontend\controllers;

use Yii;
use yii\web\UploadedFile;

use frontend\models\Audio;

class TestController extends \yii\web\Controller
{
	public $enableCsrfValidation = false;

    public function actionUpload()
    {
        return $this->render('upload');
    }

    public function actionDetail()
    {
    	return $this->render('detail');
    }

}
