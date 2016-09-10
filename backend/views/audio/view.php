<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Audio */

$this->title = $model->audio_id;
$this->params['breadcrumbs'][] = ['label' => 'Audios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="audio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'audio_id' => $model->audio_id, 'audio_sn' => $model->audio_sn], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'audio_id' => $model->audio_id, 'audio_sn' => $model->audio_sn], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'audio_id',
            'audio_sn',
            'audio_name',
            'audio_title',
            'is_origin',
            'is_pub',
            'user_sn',
            'text_sn',
            'is_del',
            'create_time:datetime',
            'update_time:datetime',
            'audio_type',
            'audio_duration',
            'audio_icon',
            'audio_url:url',
            'audio_intro',
        ],
    ]) ?>

</div>
