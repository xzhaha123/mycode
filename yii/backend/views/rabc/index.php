<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SkillSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '所有权限';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="skill-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::a('初始化权限', ['init'], ['class' => 'btn btn-success']) ?>
    <?php foreach ($data as $key => $value): ?>
        <h3><?php echo $value->description ?></h3>
        <?php if (!empty($value->children)): ?>
            <?php foreach ($value->children as $v): ?>
                <i class="fa fa-square" aria-hidden="true" style="color: #00b3ee"></i> <?= $v->name ?>
            <?php endforeach; ?>
        <?php endif; ?>
        <hr>
    <?php endforeach ?>
</div>
