<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RefTandaTangan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ref Tanda Tangans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ref-tanda-tangan-view">

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
            'id_ref_sub_skpd',
            'kd_report',
            'title_report',
            'ttd1_id_ref_pegawai',
            'ttd2_id_ref_pegawai',
            'ttd3_id_ref_pegawai',
        ],
    ]) ?>

</div>
