<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AudioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="audio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'audio_id') ?>

    <?= $form->field($model, 'audio_sn') ?>

    <?= $form->field($model, 'audio_name') ?>

    <?= $form->field($model, 'audio_title') ?>

    <?= $form->field($model, 'is_origin') ?>

    <?php // echo $form->field($model, 'is_pub') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'text_id') ?>

    <?php // echo $form->field($model, 'is_del') ?>

    <?php // echo $form->field($model, 'create_time') ?>

    <?php // echo $form->field($model, 'update_time') ?>

    <?php // echo $form->field($model, 'audio_type') ?>

    <?php // echo $form->field($model, 'audio_duration') ?>

    <?php // echo $form->field($model, 'audio_icon') ?>

    <?php // echo $form->field($model, 'audio_url') ?>

    <?php // echo $form->field($model, 'audio_intro') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
