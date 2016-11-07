<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Suggest;

class AppController extends \frontend\controllers\FrontController
{
    //TODO:remove this validation
    public $enableCsrfValidation = false;

    public function actionSuggest()
    {
        $data = $this->parseContent();

        $userId = $data->userId;
        $content = $data->content;

        $suggest = new Suggest();
        $suggest->user_id = $userId;
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
        $data = $this->parseContent();

        $appId = $data->appId;
        $version = $data->version;
        $channel = $data->channel;

        $state = array(
            'stateCode'=>'200',
            'stateMessage'=>'OK'
        );

        $item = array();
        $item['appId'] = 'appId';
        $item['channel'] = 'channel';
        $item['version'] = '1.2.1';
        $item['code'] = '2';
        $item['type'] = '1';
        $item['info'] = 'new version for user';
        $item['url'] = 'http://xxx/x.apk';
        $item['type'] = '1';
        $data = $item;

        $this->response($state, $data);
    }

}
