<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\PengajuanSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pengajuan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pengajuan') ?>

    <?= $form->field($model, 'get_barang') ?>

    <?= $form->field($model, 'jumlah') ?>

    <?= $form->field($model, 'get_user') ?>

    <?= $form->field($model, 'tgl_pengajuan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
