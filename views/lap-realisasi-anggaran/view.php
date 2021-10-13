<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LapRealisasiAnggaran */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lap Realisasi Anggarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="lap-realisasi-anggaran-view">

    <p>
          <?= Html::a('Daftar Lap.Realisasi Anggaran', ['index'], ['class' => 'btn btn-default']) ?>
       <?= Html::a('Create', ['create'], ['class' => 'btn btn-success']) ?>
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
    //        'id',
            [
                'label'=>'Nama SKPD',
                'value'=>function($model){
                    $skpd = \app\models\RefSubSkpd::findOne($model['id_skpd']);
                    return $skpd['nm_sub_unit'];
                }
            ],
           [
               'label'=>'Bulan - Tahun',
               'value'=>function($model){
                    return app\component\BulanComponent::NamaBulan($model['bulan']).' - '.$model['tahun'];
               }
           ],
                   'tgl_buat:text:Tanggal Buat Laporan'
        ],
    ]) ?>
    <p>
    <?= Html::a('<i class="fa fa-print"></i> Export to PDF', ['print-lap-realisasi-anggaran','export'=>'pdf','id'=>$model['id']], ['class'=>'btn btn-flat btn-default'])?>
     <?= Html::a('<i class="fa fa-excel"></i> Export to Excel', ['print-lap-realisasi-anggaran','export'=>'xls','id'=>$model['id']], ['class'=>'btn btn-flat btn-success'])?>
        
    </p>
    <p>
        <?= $this->render('print-lap-realisasi-anggaran',[
                 'query_pendapatan'=>$query_pendapatan,
            'query_belanja'=>$query_belanja,
            'model'=>$model
        ]) ?>
    </p>
</div>
