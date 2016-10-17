<?php

namespace frontend\controllers;

use frontend\models\Suggest;

class AppController extends \frontend\controllers\FrontController
{
    public function actionSuggest($userid, $content)
    {
        $suggest = new Suggest();
        $suggest->user_id = $userid;
        $suggest->content = $content;
        if($suggest->save())
        {
			$state = array(
	            'stateCode'=>'200',
	            'stateMessage'=>'OK'
	        );
        } else {
			$state = array(
	            'stateCode'=>'301',
	            'stateMessage'=>'Fail'
	        );
        }

        $this->response($state);
    }

    public function actionUpdate()
    {
        
    }

}
