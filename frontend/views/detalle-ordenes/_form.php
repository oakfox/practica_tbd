<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DetalleOrdenes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalle-ordenes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ordenid')->textInput() ?>

    <?= $form->field($model, 'detalleid')->textInput() ?>

    <?= $form->field($model, 'productoid')->textInput() ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
