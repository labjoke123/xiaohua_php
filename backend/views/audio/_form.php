<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Audio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="audio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'audio_sn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'audio_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'audio_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_origin')->textInput() ?>

    <?= $form->field($model, 'is_pub')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'text_id')->textInput() ?>

    <?= $form->field($model, 'is_del')->textInput() ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <?= $form->field($model, 'update_time')->textInput() ?>

    <?= $form->field($model, 'audio_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'audio_duration')->textInput() ?>

    <?= $form->field($model, 'audio_icon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'audio_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'audio_intro')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
