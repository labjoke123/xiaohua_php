<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TextSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Texts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="text-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Text', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'text_id',
            'text_sn',
            'text_title',
            'is_origin',
            'is_pub',
            // 'user_sn',
            // 'is_del',
            // 'create_time:datetime',
            // 'update_time:datetime',
            // 'text_author',
            // 'text_labels',
            // 'text_intro',
            // 'text_content:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
