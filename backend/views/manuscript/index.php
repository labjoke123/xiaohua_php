<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ManuscriptSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manuscripts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manuscript-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Manuscript', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'is_origin',
            'is_pub',
            'is_del',
            // 'create_time:datetime',
            // 'update_time:datetime',
            // 'author',
            // 'labels',
            // 'intro',
            // 'content:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
