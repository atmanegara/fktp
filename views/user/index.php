<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Buat User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
        //    'auth_key',
            'password_hash',
           // 'password_reset_token',
          'email:email',
            //'hakuser',
            //'id_skpd',
        [
          'header'=>'Status',
            'format'=>'raw',
            'value'=>function($data){
                $status = $data['status']=='10' ? "<span class='label label-success'>Aktif</span>" : "<span class='label label-danger'>non aktif</label>";
                return $status;
            }
        ],
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
