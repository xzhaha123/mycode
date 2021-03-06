<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Hero */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Heroes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hero-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'id',
            'name',
            'type',
            'str',
            'int',
            'dex',
            'hp',
            'mp',
            'min_atk',
            'max_atk',
            'def',
            'dps',
            'speed',
            /**
             * @imp 关联技能表 + groupBy + 传ID
             */
            [
                'attribute' => '技能',
                'format'=>'html',
                'value' => function($data){
                    $str = '';
                    if (is_array($data->skill)){
                        foreach ($data->skill as $value){
                            $str .= '['.Html::a($value->name,['skill/view','id'=>$value->id]).']&nbsp;&nbsp;';

                        }
                    }
                    return $str;
                }
            ]
        ],
    ]) ?>

</div>
