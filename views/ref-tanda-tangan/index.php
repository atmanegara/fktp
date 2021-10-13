<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RefTandaTanganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ref Tanda Tangans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-tanda-tangan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ref Tanda Tangan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_ref_sub_skpd',
            'kd_report',
            'title_report',
            'ttd1_id_ref_pegawai',
            //'ttd2_id_ref_pegawai',
            //'ttd3_id_ref_pegawai',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
