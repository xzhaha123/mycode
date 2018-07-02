<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Equip */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equip-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if ($model->pic): ?>

        <img src='<?= Url::to("@web/uploads/equip/$model->pic") ?>' width='100px'>

    <?php endif; ?>
    <?= $form->field($model, 'pic')->fileInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'level')->textInput() ?>

    <?= $form->field($model, 'mana')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'sid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList(\backend\models\Equip::$typeList) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
