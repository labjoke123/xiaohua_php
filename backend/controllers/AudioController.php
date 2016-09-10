<?php

namespace backend\controllers;

use Yii;
use backend\models\Audio;
use backend\models\AudioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AudioController implements the CRUD actions for Audio model.
 */
class AudioController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Audio models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AudioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Audio model.
     * @param integer $audio_id
     * @param string $audio_sn
     * @return mixed
     */
    public function actionView($audio_id, $audio_sn)
    {
        return $this->render('view', [
            'model' => $this->findModel($audio_id, $audio_sn),
        ]);
    }

    /**
     * Creates a new Audio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Audio();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'audio_id' => $model->audio_id, 'audio_sn' => $model->audio_sn]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Audio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $audio_id
     * @param string $audio_sn
     * @return mixed
     */
    public function actionUpdate($audio_id, $audio_sn)
    {
        $model = $this->findModel($audio_id, $audio_sn);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'audio_id' => $model->audio_id, 'audio_sn' => $model->audio_sn]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Audio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $audio_id
     * @param string $audio_sn
     * @return mixed
     */
    public function actionDelete($audio_id, $audio_sn)
    {
        $this->findModel($audio_id, $audio_sn)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Audio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $audio_id
     * @param string $audio_sn
     * @return Audio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($audio_id, $audio_sn)
    {
        if (($model = Audio::findOne(['audio_id' => $audio_id, 'audio_sn' => $audio_sn])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
