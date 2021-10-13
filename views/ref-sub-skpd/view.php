<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RefSubSkpd */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ref Sub Skpds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ref-sub-skpd-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'kd_bidang' => $model->kd_bidang, 'kd_urusan' => $model->kd_urusan, 'kd_unit' => $model->kd_unit, 'kd_sub' => $model->kd_sub], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'kd_bidang' => $model->kd_bidang, 'kd_urusan' => $model->kd_urusan, 'kd_unit' => $model->kd_unit, 'kd_sub' => $model->kd_sub], [
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
            'kd_bidang',
            'kd_urusan',
            'kd_unit',
            'kd_sub',
            'nm_sub_unit',
            'aktif',
        ],
    ]) ?>

</div>
