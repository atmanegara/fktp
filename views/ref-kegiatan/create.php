<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RefKegiatan */

$this->title = 'Create Ref Kegiatan';
$this->params['breadcrumbs'][] = ['label' => 'Ref Kegiatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-kegiatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
