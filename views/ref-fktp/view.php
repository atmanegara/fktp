<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RefFktp */

$this->title = 'View Data FKPT';
$this->params['breadcrumbs'][] = ['label' => 'Ref Fktps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ref-fktp-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Daftar Kode FKTP', ['index'], ['class' => 'btn btn-default']) ?>
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
        //    'id',
            'kode_fktp',
          [
              'label'=>'SKPD',
              'value'=>function($data){
                $skpd = \app\models\RefSubSkpd::findOne($data['id_sub_skpd']);
                return $skpd->nm_sub_unit;
              }
          ],
            'aktif',
        ],
    ]) ?>

</div>
