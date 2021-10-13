<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RefKegiatan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ref Kegiatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ref-kegiatan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'kd_urusan' => $model->kd_urusan, 'kd_bidang' => $model->kd_bidang, 'kd_urusan1' => $model->kd_urusan1, 'kd_bidang1' => $model->kd_bidang1, 'kd_unit' => $model->kd_unit, 'kd_sub' => $model->kd_sub, 'kd_prog' => $model->kd_prog, 'kd_keg' => $model->kd_keg, 'id_prog' => $model->id_prog], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'kd_urusan' => $model->kd_urusan, 'kd_bidang' => $model->kd_bidang, 'kd_urusan1' => $model->kd_urusan1, 'kd_bidang1' => $model->kd_bidang1, 'kd_unit' => $model->kd_unit, 'kd_sub' => $model->kd_sub, 'kd_prog' => $model->kd_prog, 'kd_keg' => $model->kd_keg, 'id_prog' => $model->id_prog], [
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
            'id',
            'kd_urusan',
            'kd_bidang',
            'kd_urusan1',
            'kd_bidang1',
            'kd_unit',
            'kd_sub',
            'kd_prog',
            'kd_keg',
            'id_prog',
            'ket_kegiatan',
            'lokasi',
            'sasaran',
            'pagu_anggaran',
            'aktif',
        ],
    ]) ?>

</div>
