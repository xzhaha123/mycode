<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SysUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sys-user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加系统用户', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'username',
            'email:email',
            'role',
            [
                'attribute' => 'status',
                'value' => function($model){
                    return $model->statusList[$model->status];
                }
            ],
            [
                'attribute' => 'created_at',
                'value' => function($model){
                    return date('Y-m-d H:i',$model->created_at);
                }
            ],
            //'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template' => '{update} {edit-role}',
                'buttons' => [
                        'edit-role' => function ($url,$model) {
                            $option = [
                                'rabc/users',
                                'uid' => $model->id,
                            ];
                            return Html::a('<span class="glyphicon glyphicon-cog"></span>',$option);
                        }
                ]
            ],
        ],
    ]); ?>
</div>
