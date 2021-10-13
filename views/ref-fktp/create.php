<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RefFktp */

$this->title = 'Create Data Fktp';
$this->params['breadcrumbs'][] = ['label' => 'Ref Fktps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-fktp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
