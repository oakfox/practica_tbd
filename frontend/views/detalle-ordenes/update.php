<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DetalleOrdenes */

$this->title = 'Update Detalle Ordenes: ' . $model->ordenid;
$this->params['breadcrumbs'][] = ['label' => 'Detalle Ordenes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ordenid, 'url' => ['view', 'ordenid' => $model->ordenid, 'detalleid' => $model->detalleid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detalle-ordenes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
