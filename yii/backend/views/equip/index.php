<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EquipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '装备';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equip-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Equip', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
            /**
             * @imp 插入图片
             */
            [
                'attribute'=>"pic",
                'format' => [
                    'image',
                    [
                        'height'=>'25px'
                    ]
                ],
                'value' => function ($model) {
                    return 'uploads/equip/'.$model->pic;
                }
            ],
            'name',
            'description',
            'level',
            'mana',
            'price',
            [
                'attribute' => 'sid',
                'value' => function($model){
                    $sid = empty($model->sid)?'':explode(',',$model->sid);
                    $new = '';
                    if (is_array($sid)){
                        foreach ($sid as $value){
                            $new .= '+'.$model->findOne($value)->name;
                        }
                        $new = substr($new,1);
                    }
                    return $new;
                }
            ],
            //'type',
            /**
             * @imp 下拉框搜索
             */
            [
                'attribute' => 'type',
                'value' => function($data){
                    return \backend\models\Equip::$typeList[$data->type];
                },
                'filter' => ['1'=>'装备','0'=>'卷轴'],
                'headerOptions' => ['width' => '170'],
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
