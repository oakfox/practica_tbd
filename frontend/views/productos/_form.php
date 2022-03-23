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


    <?= $form->field($model, 'proveedorid')->textInput() ?>



    <?= $form->field($model, 'preciounit')->textInput() ?>

    <?= $form->field($model, 'existencia')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
