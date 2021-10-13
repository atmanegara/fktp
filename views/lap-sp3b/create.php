<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LapSp3b */

$this->title = 'Create Lap Sp3b';
$this->params['breadcrumbs'][] = ['label' => 'Lap Sp3bs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lap-sp3b-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
