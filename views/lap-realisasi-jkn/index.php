<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\LapRealisasiJknSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lap Realisasi Jkns';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lap-realisasi-jkn-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Lap Realisasi Jkn', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::button('Cetak Lap Realisasi Jkn', [
            'onClick'=>'cetaklaprealisasi()',
            'class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
[
  'class'=> 'yii\grid\CheckboxColumn'  
],
       //     'id',
            [
             'header'=>'Nama SKPD / Sub SKPD',
               'value'=>function($model){
                    $skpd = \app\models\RefSubSkpd::findOne($model->id_skpd);
                    return $skpd['nm_sub_unit'];
               }
           ],
            'nomor',
            'tgl',
            'bln_realisasi',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
<script>
    function cetaklaprealisasi()
    {
        var key = Yii
    }
    </script>