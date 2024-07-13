<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Jabatan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jabatan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-outline-success w-20']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>