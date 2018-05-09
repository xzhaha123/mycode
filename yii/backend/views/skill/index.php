<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SkillSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Skills';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="skill-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Skill', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        /**
         * @imp 自定义列
         */
        'columns' => [
            [
                'attribute' => 'hero_name',
                'value' => 'hero.name',
                'label'=>'英雄名称',
                'headerOptions' => ['width' => '120'],
//                'filter' => Html::activeTextInput($searchModel, 'hero_name', [
//                    'class' => 'form-control', 'id' => null
//                ]),
            ],
//            'level',
            'name',
            'description',
//            'damage',
//            'mana',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'header' => '操作',
                'buttons' => [
                    'view' => function ($url,$model) {
                        $option = [
                            'skill/view',
                            'uid' => $model->id,
                            'sname' => $model->name
                        ];
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',$option);
                    }
                ],
//                'headerOptions' => [ 'width' => '50px' ]
            ],
        ],
    ]); ?>
</div>
