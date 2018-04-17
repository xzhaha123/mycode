<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '后台登陆';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'username',['labelOptions'=>['label'=>'用户名']])->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput()->label('密码') ?>

            <?= $form->field($model, 'rememberMe')->checkbox()->label('记住密码') ?>

            <div class="form-group">
                <?= Html::submitButton('登陆', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                <?= Html::a('注册', ['signup'],['class' => 'btn btn-info', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>