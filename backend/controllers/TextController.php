<?php

namespace backend\controllers;

use Yii;
use backend\models\Text;
use backend\models\TextSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TextController implements the CRUD actions for Text model.
 */
class TextController extends Controller
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
     * Lists all Text models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TextSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Text model.
     * @param integer $text_id
     * @param string $text_sn
     * @return mixed
     */
    public function actionView($text_id, $text_sn)
    {
        return $this->render('view', [
            'model' => $this->findModel($text_id, $text_sn),
        ]);
    }

    /**
     * Creates a new Text model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Text();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'text_id' => $model->text_id, 'text_sn' => $model->text_sn]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Text model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $text_id
     * @param string $text_sn
     * @return mixed
     */
    public function actionUpdate($text_id, $text_sn)
    {
        $model = $this->findModel($text_id, $text_sn);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'text_id' => $model->text_id, 'text_sn' => $model->text_sn]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Text model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $text_id
     * @param string $text_sn
     * @return mixed
     */
    public function actionDelete($text_id, $text_sn)
    {
        $this->findModel($text_id, $text_sn)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Text model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $text_id
     * @param string $text_sn
     * @return Text the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($text_id, $text_sn)
    {
        if (($model = Text::findOne(['text_id' => $text_id, 'text_sn' => $text_sn])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
