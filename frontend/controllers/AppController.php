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
        $suggest->suggest_sn = md5(rand().time().$userId.$content);
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

    public function actionDirect()
    {
        $data = $this->parseContent();

        $appId = $data->appId;
        $version = $data->version;
        $channel = $data->channel;

        $state = array(
            'stateCode'=>'200',
            'stateMessage'=>'OK'
        );

        $data = array(
            'total'=>3,
            'pageNum'=>1,
            'pageSize'=>3,
            'list'=>array()
        );

        $images = array(
            'https://ss0.bdstatic.com/94oJfD_bAAcT8t7mm9GUKT-xh_/timg?image&quality=100&size=b4000_4000&sec=1488616619&di=19f340a5a9db5b7c12c42b77d17bf711&src=http://pic12.nipic.com/20110213/580124_212334691148_2.jpg',
            'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1488626703905&di=b1e3400e261bbd876aae733522510c3c&imgtype=0&src=http%3A%2F%2Fpic41.nipic.com%2F20140503%2F9908010_145213320111_2.jpg',
            'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1488626703905&di=7702488b37e1bc05f656dc3e9710248d&imgtype=0&src=http%3A%2F%2Fpic31.nipic.com%2F20130713%2F7447430_161806835000_2.jpg'
        );

        for($i=0;$i<2;$i++)
        {
            $item = array();
            $item['url'] = $images[$i];

            $data['list'][] = $item;
        }

        $this->response($state, $data);
    }
}
