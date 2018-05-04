<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SkillSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '分配权限';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="skill-index">
    <?php $form = ActiveForm::begin(['id'=>'users']); ?>
    <h3>分配角色</h3>
    <?= $form->field($model,'description')->checkboxList(ArrayHelper::map($model->auth,'name','description'),['value'=>ArrayHelper::getColumn($model,'name')])->label(false)?>
    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success sub']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>


