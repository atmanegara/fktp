<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LapRealisasiJkn */

$this->title = 'Create Lap Realisasi Jkn';
$this->params['breadcrumbs'][] = ['label' => 'Lap Realisasi Jkns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lap-realisasi-jkn-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
