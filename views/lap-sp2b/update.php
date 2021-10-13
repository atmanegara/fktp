<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LapSp2b */

$this->title = 'Update Lap Sp2b: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lap Sp2bs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lap-sp2b-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
