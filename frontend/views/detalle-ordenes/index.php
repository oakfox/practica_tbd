<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DetalleOrdenesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detalle Ordenes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalle-ordenes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Detalle Ordenes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ordenid',
            'detalleid',
            'productoid',
            'cantidad',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action,  $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ordenid' => $model->ordenid, 'detalleid' => $model->detalleid]);
                 }
            ],
        ],
    ]); ?>


</div>
