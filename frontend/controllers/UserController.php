<?php

namespace frontend\controllers;

use frontend\models\User;
use frontend\models\SystemMessage;

class UserController extends \frontend\controllers\FrontController
{
    public function actionDetail($id)
    {
        $user = User::find()->where(['user_id'=>$id])->one();

        $state = array(
            'stateCode'=>'200',
            'stateMessage'=>'OK'
        );

        $data = $user->attributes;
        $data['praises'] = array();
        $data['collects'] = array();
        $data['comments'] = array();

        $praises = $user->praises;
        foreach ($praises as $praise) {
            $data['praises'][] = $praise->attributes;
        }

        $collects = $user->collects;
        foreach ($collects as $collect) {
            $data['collects'][] = $collect->attributes;
        }

        $comments = $user->comments;
        foreach ($comments as $comment) {
            $data['comments'][] = $comment->attributes;
        }

        $this->response($state, $data);
    }


    public function actionMesses($id)
    {
        $messes = SystemMessage::findAll(['target_user_id'=>$id, 'trigger_user_id'=>0]);

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

        foreach ($messes as $mess) {
            $data['list'][] = $mess->attributes;
        }

        $this->response($state, $data);
    }
}
