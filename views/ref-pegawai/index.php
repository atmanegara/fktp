<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RefPegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Pegawai';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-pegawai-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Buat Data Pegawai', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
         'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

     //       'id',
            [
              'header'=>'SKPD',
                'value'=>function($data){
                    $skpd = \app\models\RefSubSkpd::findOne($data['id_skpd'])->nm_sub_unit;
                    return $skpd;
                }
            ],
            'nip_peg:text:NIP',
            'nm_peg:text:Nama',
            'jabt_peg:text:Jabatan',
        'aktif',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
