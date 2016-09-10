<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AudioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Audios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="audio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Audio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'audio_id',
            'audio_sn',
            'audio_name',
            'audio_title',
            'is_origin',
            // 'is_pub',
            // 'user_sn',
            // 'text_sn',
            // 'is_del',
            // 'create_time:datetime',
            // 'update_time:datetime',
            // 'audio_type',
            // 'audio_duration',
            // 'audio_icon',
            // 'audio_url:url',
            // 'audio_intro',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
