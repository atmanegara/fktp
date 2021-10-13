<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\component\BulanComponent;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DataSaldoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Saldos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-saldo-index">

   <div class="box">
     
            <div class="box-body table-responsive ">

               <h4>Input Kas Saldo</h4>
          
        <?php
        $nBulan = date('n');
        $i=1;
        for($i==1;$i<=$nBulan;$i++){
            if($nBulan==$i){
                $style="btn btn-xs bg-success margin";
            }else{
                $style="btn btn-xs bg-maroon margin";
            }
        echo Html::a('<small> Bulan : '.BulanComponent::NamaBulan($i).'</small>' ,['create-buku-kas','id_skpd'=>Yii::$app->request->get('id_skpd'),'bulan'=>$i], ['class' => $style]); 
        }
                ?>
  
            </div>
       
   </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
     //   'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

        //    'id',
       //     'id_ref_fktp',
        [
              'header'=>'Bulan - Tahun',
                'value'=>function($data){
        $bulantahun = app\component\BulanComponent::NamaBulan($data['bulan']).' - '.$data['tahun'];
        return $bulantahun;       
        }
            ],
           'notransaksi',
        'saldo:decimal:Saldo Akhir',
            //'aktif',

//            ['class' => 'yii\grid\ActionColumn',
//                'template'=>'{detail}',
//                'buttons'=>[
//                    'detail'=>function($url,$data){
//                        return yii\bootstrap\Html::a('Rincian', ['rincian','notransaksi'=>$data['notransaksi']], ['class'=>'btn btn-warning']);
//                    }
//                ]],
        ],
    ]); ?>


</div>
 