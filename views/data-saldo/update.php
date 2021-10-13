<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DataSaldo */

$this->title = 'Update Data Saldo: ' . $model->id;
?>
<div class="data-saldo-update">
    <div class="row">
        <div class="col-md-8">
              <div class="box box-warning">
        <div class="box-header">
            .:. Informasi
        </div>
        <div class="box-body">
            SKPD yang muncul hanya SKPD yang sudah ada Kode FKTP, jika ada SKPD tidak muncul silahkan isi kode FKTP di menu Data FKPT
        </div>
    </div>
        </div>
    </div>
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
