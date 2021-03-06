<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Skill */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="skill-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hero_id')->dropDownList(ArrayHelper::map($model->AllHeros,'id','name')) ?>

    <?= $form->field($model, 'level')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'damage')->textInput() ?>

    <?= $form->field($model, 'mana')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    $("#skill-hero_id").chosen();
</script>

