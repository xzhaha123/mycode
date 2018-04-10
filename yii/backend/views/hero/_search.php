<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HeroSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hero-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'str') ?>

    <?= $form->field($model, 'int') ?>

    <?php // echo $form->field($model, 'dex') ?>

    <?php // echo $form->field($model, 'hp') ?>

    <?php // echo $form->field($model, 'mp') ?>

    <?php // echo $form->field($model, 'min_atk') ?>

    <?php // echo $form->field($model, 'max_atk') ?>

    <?php // echo $form->field($model, 'def') ?>

    <?php // echo $form->field($model, 'dps') ?>

    <?php // echo $form->field($model, 'speed') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
