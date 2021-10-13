<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DataBukuKas */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Buku Kas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="data-buku-kas-view">

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
            'id',
            'nourut',
            'id_ref_skpd',
            'id_ref_kegiatan',
            'id_ref_program',
            'id_ref_sub_skpd',
            'tahun',
            'bulan',
            'pendapatan',
            'belanja',
            'saldo',
            'notransaksi',
            'nobukti',
            'aktif',
        ],
    ]) ?>

</div>
