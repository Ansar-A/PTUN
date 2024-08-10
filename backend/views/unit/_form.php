<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Unit $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="unit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_unit')->dropDownList([ 'umum' => 'Umum', 'keuangan' => 'Keuangan', 'kepegawaian' => 'Kepegawaian', 'panmud' => 'Panmud', 'panitrapengganti' => 'Panitrapengganti', 'jurusita' => 'Jurusita', 'ppnpn' => 'Ppnpn', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
