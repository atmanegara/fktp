<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DataBukuKas */

$this->title = 'Update Data Buku Kas: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Buku Kas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="data-buku-kas-update">

  <div class="panel panel-warning">
        <div class="panel-heading">
            Update Data
        </div>
        <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>            
        </div>
    </div>


</div>
