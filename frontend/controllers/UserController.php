<?php

namespace frontend\controllers;

class UserController extends \yii\web\Controller
{
    public function actionList()
    {
        return $this->render('list');
    }

}
