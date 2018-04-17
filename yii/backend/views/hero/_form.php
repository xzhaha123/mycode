<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Hero */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hero-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'str')->textInput() ?>

    <?= $form->field($model, 'int')->textInput() ?>

    <?= $form->field($model, 'dex')->textInput() ?>

    <?= $form->field($model, 'hp')->textInput() ?>

    <?= $form->field($model, 'mp')->textInput() ?>

    <?= $form->field($model, 'min_atk')->textInput() ?>

    <?= $form->field($model, 'max_atk')->textInput() ?>

    <?= $form->field($model, 'def')->textInput() ?>

    <?= $form->field($model, 'dps')->textInput() ?>

    <?= $form->field($model, 'speed')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
