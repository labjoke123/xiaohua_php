<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TextSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="text-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'text_id') ?>

    <?= $form->field($model, 'text_sn') ?>

    <?= $form->field($model, 'text_title') ?>

    <?= $form->field($model, 'is_origin') ?>

    <?= $form->field($model, 'is_pub') ?>

    <?php // echo $form->field($model, 'user_sn') ?>

    <?php // echo $form->field($model, 'is_del') ?>

    <?php // echo $form->field($model, 'create_time') ?>

    <?php // echo $form->field($model, 'update_time') ?>

    <?php // echo $form->field($model, 'text_author') ?>

    <?php // echo $form->field($model, 'text_labels') ?>

    <?php // echo $form->field($model, 'text_intro') ?>

    <?php // echo $form->field($model, 'text_content') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
