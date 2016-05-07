<?php

namespace frontend\controllers;

use frontend\models\Manuscript;

class ManuscriptController extends \frontend\controllers\FrontController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionList()
    {
    	$manuscripts = Manuscript::find()->all();

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

    	foreach ($manuscripts as $manuscript) {
    		$data['list'][] = $manuscript->attributes;
    	}

    	$resArray = array(
    		'state'=>$state,
    		'data'=>$data
    	);

    	$this->outputDataFormat($resArray);
    }

    public function actionDetail($id)
    {
    	$manuscript = Manuscript::find()->where(['id'=>$id])->one();

		$state = array(
    		'stateCode'=>'200',
    		'stateMessage'=>'OK'
    	);

    	$data = $manuscript->attributes;

    	$resArray = array(
    		'state'=>$state,
    		'data'=>$data
    	);

    	$this->outputDataFormat($resArray);
    }

}
