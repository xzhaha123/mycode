<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SysUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sys Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sys-user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sys User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'username',
            'email:email',
            'role',
            'status',
            'created_at',
            //'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template' => '{update} {edit-role}',
                'buttons' => [
                        'edit-role' => function ($url,$model,$key) {
                            $option = [
                                'title' => '角色设置',
                            ];
//                            return Html::;
                        }
                ]
            ],
        ],
    ]); ?>
</div>
