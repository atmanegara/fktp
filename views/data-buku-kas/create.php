<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DataBukuKas */

$this->title = 'Create Data Buku Kas';
$this->params['breadcrumbs'][] = ['label' => 'Data Buku Kas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-buku-kas-create">
<div class="panel panel-primary">
        <div class="panel-heading">
            Buat Data baru
        </div>
        <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>            
        </div>
    </div>


</div>
