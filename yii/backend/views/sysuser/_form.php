<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SysUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sys-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true,'disabled'=>'disabled']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <!-- @imp 下拉框 -->
    <?= $form->field($model, 'status')->dropDownList($model->statusList) ?>

    <?= $form->field($model, 'created_at')->textInput(['value'=>date("Y-m-d H:i"),'disabled'=>'disabled']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
