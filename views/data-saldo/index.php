<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DataSaldoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Saldo';
?>
<div class="data-saldo-index">

    <div class="row">
        <div class="col-md-12">
               <pre style="font-weight:bold;font-size:14px">
<i>Halaman Data Saldo, digunakan jika bulan terakhir realisasi tidak ada didalam aplikasi</i></pre>  
        </div>
  
          
    </div>

    <p>
        <?= Html::a('Buat Baru Data Saldo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
   //     'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

        //    'notransaksi',
            [
              'header'=>'Bulan - Tahun',
                'value'=>function($data){
        $bulantahun = app\component\BulanComponent::NamaBulan($data['bulan']).' - '.$data['tahun'];
        return $bulantahun;       
        }
            ],
         [
             'header'=>'Nama SKPD',
             'value'=>function($data){
             $skpd = app\models\RefSubSkpd::findOne($data['id_skpd'])->nm_sub_unit;
             return $skpd;
             }
         ],
         //   'tahun',
          //  'bulan',
            'saldo:decimal:Saldo Terakhir',
            //'aktif',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
