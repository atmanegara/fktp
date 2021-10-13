<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DataSaldo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Saldos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="data-saldo-view">

 
    <p>
                <?= Html::a('Daftar Data Saldo', ['index'], ['class' => 'btn btn-default']) ?>
       <?= Html::a('Create', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
       //     'id',
       //     'id_skpd',
       //     'tahun',
       //     'bulan',
            [
              'label'=>'SKPD',
                'value'=>function($model){
                    $skpd = app\models\RefSubSkpd::findOne($model['id_skpd'])->nm_sub_unit;
                    return $skpd;
                }
            ],
                    [
                      'label'=>'Bulan - Tahun',
                        'value'=>function($data){
                        return app\component\BulanComponent::NamaBulan($data['bulan']).'-'.$data['tahun'];
                        }
                    ],
            'notransaksi',
            'saldo:decimal:Saldo Akhir',
            'aktif',
        ],
    ]) ?>

</div>
