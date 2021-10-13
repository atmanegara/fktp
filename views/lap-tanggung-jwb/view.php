<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LapTanggungJwb */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lap Tanggung Jwbs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="lap-tanggung-jwb-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tahun',
            'id_skpd',
            'notransaksi',
            'bulan',
            'format_fktp',
            'tgl_jam',
        ],
    ]) ?>
    <p>
        <?= $this->render('print-lap-tanggung-jwb',[
            'datakas'=>$datakas,
             'dataskpd'=>$dataskpd
        ]) ?>
    </p>
</div>
