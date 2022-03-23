<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProductosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'productoid') ?>

    <?= $form->field($model, 'proveedorid') ?>

    <?= $form->field($model, 'categoriaid') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'preciounit') ?>

    <?php // echo $form->field($model, 'existencia') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
