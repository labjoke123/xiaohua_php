<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Text */

$this->title = 'Update Text: ' . $model->text_id;
$this->params['breadcrumbs'][] = ['label' => 'Texts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->text_id, 'url' => ['view', 'text_id' => $model->text_id, 'text_sn' => $model->text_sn]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="text-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
