<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LapSp2bSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lap Sp2bs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lap-sp2b-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Lap Sp2b', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_skpd',
            'no_sp2b',
            'tgl_sp2b',
            'id_lap_sp3b',
            //'id_tnd_tnagn',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
