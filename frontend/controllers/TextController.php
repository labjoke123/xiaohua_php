<?php

namespace frontend\controllers;

use frontend\models\Text;

class TextController extends \frontend\controllers\FrontController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

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
    		$data['list'][] = $text->attributes;
    	}

    	$resArray = array(
    		'state'=>$state,
    		'data'=>$data
    	);

    	$this->outputDataFormat($resArray);
    }

    public function actionDetail($id)
    {
    	$text = Text::find()->where(['id'=>$id])->one();

		$state = array(
    		'stateCode'=>'200',
    		'stateMessage'=>'OK'
    	);

    	$data = $text->attributes;

    	$resArray = array(
    		'state'=>$state,
    		'data'=>$data
    	);

    	$this->outputDataFormat($resArray);
    }

}
