<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Equip */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '装备', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equip-view">

    <h1><img src="uploads/equip/<?= $model->pic ?>" height="35px"> <?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'description',
            'level',
            'mana',
            'price',
            'sid',
            [
                'attribute' => 'type',
                'value' => function($model){
                    return \backend\models\Equip::$typeList[$model->type];
                }
            ]
        ],
    ]) ?>

</div>
