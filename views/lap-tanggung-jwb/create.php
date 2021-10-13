<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LapTanggungJwb */

$this->title = 'Create Lap Tanggung Jwb';
$this->params['breadcrumbs'][] = ['label' => 'Lap Tanggung Jwbs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lap-tanggung-jwb-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
