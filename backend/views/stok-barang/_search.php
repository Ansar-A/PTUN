<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\StokBarangSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="stok-barang-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_stok') ?>

    <?= $form->field($model, 'kode') ?>

    <?= $form->field($model, 'nama_barang') ?>

    <?= $form->field($model, 'satuan') ?>

    <?= $form->field($model, 'stok') ?>

    <?php // echo $form->field($model, 'keluar') ?>

    <?php // echo $form->field($model, 'sisa') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <?php // echo $form->field($model, 'get_jenis') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
