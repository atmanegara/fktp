<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LapSp2b */

$this->title = 'Create Lap Sp2b';
$this->params['breadcrumbs'][] = ['label' => 'Lap Sp2bs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lap-sp2b-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
