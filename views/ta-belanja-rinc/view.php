<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TaBelanjaRinc */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ta Belanja Rincs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ta-belanja-rinc-view">

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
//            'id',
//            'tahun',
//            'kd_urusan',
//            'kd_bidang',
//            'kd_unit',
//            'kd_sub',
//            'kd_prog',
//            'id_prog',
//            'kd_rek_1',
//            'kd_rek_2',
//            'kd_rek_3',
//            'kd_rek_4',
//            'kd_rek_5',
//            'no_rinc',
            [
              'label'=>'No Rek',
                'value'=>function($model){
                    $norek = $model['kd_rek_1'].'.'.$model['kd_rek_2'].'.'.$model['kd_rek_3'].'.'.$model['kd_rek_4'].'.'.$model['kd_rek_5'];
                    return $norek;
                }
            ],
            'keterangan',
                    'total:decimal:Pagu',
            'aktif',
        ],
    ]) ?>

</div>
