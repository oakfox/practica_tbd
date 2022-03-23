<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Clientes */

$this->title = $model->clienteid;
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="clientes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'clienteid' => $model->clienteid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'clienteid' => $model->clienteid], [
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
            'clienteid',
            'cedula_ruc',
            'nombrecia',
            'nombrecontacto',
            'direccioncli',
            'fax',
            'email:email',
            'celular',
            'fijo',
        ],
    ]) ?>

</div>
