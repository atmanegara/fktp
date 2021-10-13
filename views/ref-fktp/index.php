<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RefFktpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Kode FKTP';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-fktp-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Buat Baru Kode FKTP', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
      //  'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

     //       'id',
            'format_fktp',
        //    'id_sub_skpd',
            [
              'header'=>'Sub SKPD',
                'attribute'=>'id_sub_skpd',
                'value'=>'subSkpd.nm_sub_unit'
            ],
            'aktif',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
