<?php

use yii\helpers\Html;
use backend\components\widgets\SkillView;

/* @var $this yii\web\View */
/* @var $model backend\models\Skill */
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Skills', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="skill-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    </p>

    <?= SkillView::widget([
        'model' => $model,
        'skill' => $skill,
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
                'value' => function($model,$skill){
                    $str = '';
                    if (is_array($skill->skill)){
                        foreach ($skill->skill as $value){
                            $link = Html::a('[LV'.$value->level.']', ['update','id' => $value->id]);
                            $str .= ' / ' . $link;
                        }
                        $str = substr($str,2);
                    }
                    return $str;
                }
            ],
            [
                'attribute' => 'damage',
                'value' => function($model,$skill){
                    $str = '';
                    if (is_array($skill->skill)){
                        foreach ($skill->skill as $value){
                            $str .= '/'.$value->damage;
                        }
                        $str = substr($str,1);
                    }
                    return $str;
                }
            ],
            [
                'attribute' => 'mana',
                'value' => function($model,$skill){
                    $str = '';
                    if (is_array($skill->skill)){
                        foreach ($skill->skill as $value){
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
