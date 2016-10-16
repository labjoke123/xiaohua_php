<?php

namespace frontend\controllers;

use frontend\models\User;

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


    public function actionSystemMesses($id)
    {

    }
}
