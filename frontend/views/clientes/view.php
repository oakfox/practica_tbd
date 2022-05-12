<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
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


    <p>
        <?= Html::a('Crear orden', ['/ordenes/create','clienteid'=>$model->clienteid], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ordenid',
            'nempleadoid',
            'nclienteid',
            'fechaorden',
            'descuento',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action,  $model, $key, $index, $column) {
                    return Url::toRoute(['/ordenes/'.$action, 'ordenid' => $model->ordenid]);
                }
            ],
        ],
    ]); ?>

</div>
