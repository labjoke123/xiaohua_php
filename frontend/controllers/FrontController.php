<?php

namespace frontend\controllers;

class FrontController extends \yii\web\Controller
{
	public function response($state=array(), $data=array(), $type=0)
	{
    	$resArray = array(
    		'state'=>$state,
    		'data'=>$data
    	);

    	print_r($this->dataFormat($resArray, $type));
	}

	/**
	* type: 1 json, 2 xml
	**/
	public function dataFormat($data, $type=0)
	{
		if(0 == $type) {
			return json_encode($data);
		} 
		if(1 == $type) {
			return "xml to be developed";
		}
	}
}
