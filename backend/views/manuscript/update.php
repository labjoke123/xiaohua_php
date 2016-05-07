<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Manuscript */

$this->title = 'Update Manuscript: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Manuscripts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="manuscript-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
