<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LapRealisasiAnggaran */

$this->title = 'Create Lap Realisasi Anggaran';
$this->params['breadcrumbs'][] = ['label' => 'Lap Realisasi Anggarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lap-realisasi-anggaran-create">

 <div class="panel panel-primary">
        <div class="panel-heading">
            Buat Data baru
        </div>
        <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>            
        </div>
    </div>
</div>
