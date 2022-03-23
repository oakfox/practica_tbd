<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Clientes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clientes-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($model, 'clienteid')->textInput() ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'cedula_ruc')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'nombrecia')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'nombrecontacto')->textInput(['maxlength' => true]) ?>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'direccioncli')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'celular')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'fijo')->textInput(['maxlength' => true]) ?>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        </div>
    </div>









    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
