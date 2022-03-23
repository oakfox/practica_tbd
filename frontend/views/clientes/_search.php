<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ClientresSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clientes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'clienteid') ?>

    <?= $form->field($model, 'cedula_ruc') ?>

    <?= $form->field($model, 'nombrecia') ?>

    <?= $form->field($model, 'nombrecontacto') ?>

    <?= $form->field($model, 'direccioncli') ?>

    <?php // echo $form->field($model, 'fax') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'celular') ?>

    <?php // echo $form->field($model, 'fijo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
