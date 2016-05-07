<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Manuscript */

$this->title = 'Create Manuscript';
$this->params['breadcrumbs'][] = ['label' => 'Manuscripts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manuscript-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
