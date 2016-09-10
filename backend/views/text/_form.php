<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Text */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="text-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'text_sn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_origin')->textInput() ?>

    <?= $form->field($model, 'is_pub')->textInput() ?>

    <?= $form->field($model, 'user_sn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_del')->textInput() ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <?= $form->field($model, 'update_time')->textInput() ?>

    <?= $form->field($model, 'text_author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text_labels')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text_intro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text_content')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
