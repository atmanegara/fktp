<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LapRealisasiJkn */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lap Realisasi Jkns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="lap-realisasi-jkn-view">

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
           [
             'label'=>'Nama SKPD / Sub SKPD',
               'value'=>function($model){
                    $skpd = \app\models\RefSubSkpd::findOne($model->id_skpd);
                    return $skpd['nm_sub_unit'];
               }
           ],
            'nomor',
            'tgl',
            'bln_realisasi',
        ],
    ]) ?>
    <?= $this->render('print_realisasi_jkn',[
         'query' => $query,
                    'refSubSkpd' => $refSubSkpd,
                    'dataSaldoAwal' => $dataSaldoAwal,
                    'keterangan' => $keterangan,
                    'jumsaldobulanx' => $jumsaldobulanx,
                    'jumsaldosampaibulanx' => $jumsaldosampaibulanx,
            'bulan'=>$bulan
    ]) ?>
</div>
