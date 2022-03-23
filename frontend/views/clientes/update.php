<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Clientes */

$this->title = 'Update Clientes: ' . $model->clienteid;
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->clienteid, 'url' => ['view', 'clienteid' => $model->clienteid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clientes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
