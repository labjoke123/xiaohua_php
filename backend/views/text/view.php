<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Text */

$this->title = $model->text_id;
$this->params['breadcrumbs'][] = ['label' => 'Texts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="text-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'text_id' => $model->text_id, 'text_sn' => $model->text_sn], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'text_id' => $model->text_id, 'text_sn' => $model->text_sn], [
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
            'text_id',
            'text_sn',
            'text_title',
            'is_origin',
            'is_pub',
            'user_id',
            'is_del',
            'create_time:datetime',
            'update_time:datetime',
            'text_author',
            'text_labels',
            'text_intro',
            'text_content:ntext',
        ],
    ]) ?>

</div>
