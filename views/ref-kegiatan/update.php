<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RefKegiatan */

$this->title = 'Update Ref Kegiatan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ref Kegiatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'kd_urusan' => $model->kd_urusan, 'kd_bidang' => $model->kd_bidang, 'kd_urusan1' => $model->kd_urusan1, 'kd_bidang1' => $model->kd_bidang1, 'kd_unit' => $model->kd_unit, 'kd_sub' => $model->kd_sub, 'kd_prog' => $model->kd_prog, 'kd_keg' => $model->kd_keg, 'id_prog' => $model->id_prog]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ref-kegiatan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
