<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Ordenes */

$this->title = $model->ordenid;
$this->params['breadcrumbs'][] = ['label' => 'Ordenes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ordenes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ordenid' => $model->ordenid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ordenid' => $model->ordenid], [
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
            'ordenid',
            'nempleadoid',
            'nclienteid',
            'fechaorden',
            'descuento',
        ],
    ]) ?>

</div>


<p>
    <?= Html::a('Agregar Articulos', ['/detalle-ordenes/create','ordenid'=>$model->ordenid], ['class' => 'btn btn-success']) ?>
</p>

<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        //'ordenid',
        //'detalleid',
        'nproductoid',
        'cantidad',
        [
            'class' => ActionColumn::className(),
            'urlCreator' => function ($action,  $model, $key, $index, $column) {
                return Url::toRoute([$action, 'ordenid' => $model->ordenid, 'detalleid' => $model->detalleid]);
            }
        ],
    ],
]); ?>
