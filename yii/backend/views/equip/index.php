<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EquipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Equips';
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
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'name',
            'description',
            'level',
            'mana',
            'price',
            [
                'attribute' => 'sid',
                'value' => function($data){
                    $sid = empty($data->sid)?'':explode(',',$data->sid);
                    $new = '';
                    if (is_array($sid)){
                        foreach ($sid as $value){
                            $new .= '+'.$data->findOne($value)->name;
                        }
                        $new = substr($new,1);
                    }
                    return $new;
                }
            ],
            //'type',
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
