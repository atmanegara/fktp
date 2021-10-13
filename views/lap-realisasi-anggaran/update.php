<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LapRealisasiAnggaran */

$this->title = 'Update Lap Realisasi Anggaran: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lap Realisasi Anggarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lap-realisasi-anggaran-update">

    <div class="panel panel-warning">
        <div class="panel-heading">
            Update Data
        </div>
        <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>            
        </div>
    </div>


</div>
