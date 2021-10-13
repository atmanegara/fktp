<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RefSkpd */

$this->title = 'Create Ref Skpd';
$this->params['breadcrumbs'][] = ['label' => 'Ref Skpds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-skpd-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
