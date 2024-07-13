<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\JenisBarang $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card-body">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Base info</h3>
        </div>
        <div class="card-body">

            <?= $form->field($model, 'jenis_barang')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>


        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>