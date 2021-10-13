<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LapSp3b */

$this->title = 'Update Lap Sp3b: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lap Sp3bs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lap-sp3b-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
