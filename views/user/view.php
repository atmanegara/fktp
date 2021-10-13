<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\RefSubSkpd;
/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">


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
        //    'id',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
        ///    'hakuser',
     [
       'label'=>"SKPD",
         'value'=>function($model){
         $subskpd = RefSubSkpd::find()->where(['id'=>$model['id_skpd']])->one();
         return $subskpd['nm_sub_unit'];
         }
     ],
           [
          'label'=>'Status',
            'format'=>'raw',
            'value'=>function($data){
                $status = $data['status']=='10' ? "<span class='label label-success'>Aktif</span>" : "<span class='label label-danger'>non aktif</label>";
                return $status;
            }
        ],
        //    'created_at',
         //   'updated_at',
        ],
    ]) ?>

</div>
