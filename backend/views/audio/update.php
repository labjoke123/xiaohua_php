<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Audio */

$this->title = 'Update Audio: ' . $model->audio_id;
$this->params['breadcrumbs'][] = ['label' => 'Audios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->audio_id, 'url' => ['view', 'audio_id' => $model->audio_id, 'audio_sn' => $model->audio_sn]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="audio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
