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
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'hero_id',
            'level',
            'name',
            'description',
            //'damage',
            //'mana',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
