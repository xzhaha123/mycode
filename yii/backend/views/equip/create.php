<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Equip */

$this->title = 'Create Equip';
$this->params['breadcrumbs'][] = ['label' => 'Equips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equip-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
