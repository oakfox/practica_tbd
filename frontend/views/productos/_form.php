<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Productos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productos-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-2"><?= $form->field($model, 'productoid')->textInput() ?></div>
        <div class="col-lg-4">
            <?= $form->field($model, 'categoriaid')->dropDownList(\app\models\Categorias::getListanombrecat(),['prompt'=>'Selecciona...']) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'descripcion')->textarea(['rows' => 4]) ?>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'proveedorid')->dropDownList(\app\models\Proveedores::getLproveedor(),['prompt'=>'Selecciona...']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'preciounit')->textInput() ?>

        </div>
        <div class="col-lg-3">

            <?= $form->field($model, 'existencia')->textInput() ?>

        </div>
    </div>





    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
