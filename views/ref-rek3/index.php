<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RefRek3Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ref Rek3s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-rek3-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ref Rek3', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'kd_rek_1',
            'kd_rek_2',
            'kd_rek_3',
            'nm_rek_3',
            //'saldonorm',
            //'aktif',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
