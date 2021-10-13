<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TaBelanjaRinc */

$this->title = 'Update Belanja';
$this->params['breadcrumbs'][] = ['label' => 'Ta Belanja Rincs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ta-belanja-rinc-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
