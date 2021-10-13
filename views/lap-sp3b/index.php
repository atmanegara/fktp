<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LapSp3bSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lap Sp3bs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lap-sp3b-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Lap Sp3b', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_skpd',
            'bulan',
            'no_sp3b',
            'tgl_sp3b',
            //'no_dppa',
            //'tgl_dppa',
            //'catatan:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
