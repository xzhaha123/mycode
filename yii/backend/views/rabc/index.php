<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SkillSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '权限列表';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="skill-index">
    <?php $form = ActiveForm::begin(['id'=>'rabc']); ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::a('初始化权限', ['init'], ['class' => 'btn btn-success']) ?>
    <?php foreach ($model->auth as $key => $value): ?>
        <h3><?php echo $value->description ?></h3>
        <?= $form->field($model,'description')->checkboxList(ArrayHelper::map($model->item,'name','description'),['name'=>$value->name,'value'=>ArrayHelper::getColumn($value->children,'name')])->label(false) //@imp 复选框+arrayhelper?>
        <hr>
    <?php endforeach ?>
    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success sub']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<script>
    $('.sub').click(function () {
        var form = $('#rabc')
        $.post(form.attr('action'),form.serialize(),function (data) {
            if (data == 'ok'){
                layer.alert('保存成功')
            }else{
                layer.alert('保存失败')
            }
        },'json')
        return false;
    })
</script>

