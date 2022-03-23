<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Productos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'productoid')->textInput() ?>

    <?= $form->field($model, 'proveedorid')->textInput() ?>

    <?= $form->field($model, 'categoriaid')->dropDownList(\app\models\Categorias::getListanombrecat(),['prompt'=>'Selecciona...']) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'preciounit')->textInput() ?>

    <?= $form->field($model, 'existencia')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
