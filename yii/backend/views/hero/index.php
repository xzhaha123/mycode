<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HeroSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Heroes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hero-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Hero', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'name',
            [
                'attribute' => 'type',
                'format' => 'raw',
                'value' => function($model){
                    switch ($model->type){
                        case '0':
                            $label_type = 'danger';
                            break;
                        case '1':
                            $label_type = 'success';
                            break;
                        case '2':
                            $label_type = 'info';
                            break;
                        default:
                            $label_type = 'danger';
                    }
                    return '<span class="label label-'.$label_type.'">'.$model->heroType[$model->type].'</span>';
                }
            ],
            [
                'attribute' => 'str',
                'format' => 'raw',
                'value' => function ($model) {
                    return '<span class="label label-danger">'.$model->str.'</span>';
                }
            ],
            [
                'attribute' => 'int',
                'format' => 'raw',
                'value' => function ($model) {
                    return '<span class="label label-info">'.$model->int.'</span>';
                }
            ],
            [
                'attribute' => 'dex',
                'format' => 'raw',
                'value' => function ($model) {
                    return '<span class="label label-success">'.$model->dex.'</span>';
                }
            ],
            'hp',
            'mp',
            'min_atk',
            'max_atk',
            'def',
            'dps',
            'speed',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
<!-- @imp 自定义区块（放置） -->
<?php $this->beginBlock('javascript') ?>

<?php $this->endBlock() ?>
