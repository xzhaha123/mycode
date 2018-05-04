<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Skill */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Skills', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="skill-view">

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
            [
                'attribute' => 'hero_id',
                'value' => function($model){
                    return $model->hero->name;
                }
            ],
            'name',
            'description',
            [
                'attribute' => 'level',
                'value' => function($model){
                    $data = $model->hero;
                    $str = '';
                    if (is_array($data->skills)){
                        foreach ($data->skills as $value){
                            $str .= '/'.$value->level;
                        }
                        $str = substr($str,1);
                    }
                    return $str;
                }
            ],
            [
                'attribute' => 'damage',
                'value' => function($model){
                    $data = $model->hero;
                    $str = '';
                    if (is_array($data->skills)){
                        foreach ($data->skills as $value){
                            $str .= '/'.$value->damage;
                        }
                        $str = substr($str,1);
                    }
                    return $str;
                }
            ],
            [
                'attribute' => 'mana',
                'value' => function($model){
                    $data = $model->hero;
                    $str = '';
                    if (is_array($data->skills)){
                        foreach ($data->skills as $value){
                            $str .= '/'.$value->mana;
                        }
                        $str = substr($str,1);
                    }
                    return $str;
                }
            ],
        ],
    ]) ?>

</div>
