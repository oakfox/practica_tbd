<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\OrdenesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ordenes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ordenid') ?>

    <?= $form->field($model, 'empleadoid') ?>

    <?= $form->field($model, 'clienteid') ?>

    <?= $form->field($model, 'fechaorden') ?>

    <?= $form->field($model, 'descuento') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
