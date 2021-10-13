<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\LapTanggungJwbSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lap Tanggung Jwbs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lap-tanggung-jwb-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Lap Tanggung Jwb', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'tahun',
            'id_skpd',
            'notransaksi',
            'bulan',
            //'format_fktp',
            //'tgl_jam',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
