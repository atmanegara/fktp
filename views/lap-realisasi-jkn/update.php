<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LapRealisasiJkn */

$this->title = 'Update Lap Realisasi Jkn: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lap Realisasi Jkns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lap-realisasi-jkn-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
