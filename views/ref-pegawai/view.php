<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RefPegawai */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ref Pegawais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ref-pegawai-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
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
            [
              'label'=>'SKPD',
                'value'=>function($data){
                    $skpd = \app\models\RefSubSkpd::findOne($data['id_skpd'])->nm_sub_unit;
                    return $skpd;
                }
            ],
            'nip_peg:text:NIP',
            'nm_peg:text:Nama',
            'jabt_peg:text:Jabatan',
                    'aktif'
        ],
    ]) ?>

</div>
