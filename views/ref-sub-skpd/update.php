<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RefSubSkpd */

$this->title = 'Update Ref Sub Skpd: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ref Sub Skpds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'kd_bidang' => $model->kd_bidang, 'kd_urusan' => $model->kd_urusan, 'kd_unit' => $model->kd_unit, 'kd_sub' => $model->kd_sub]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ref-sub-skpd-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
