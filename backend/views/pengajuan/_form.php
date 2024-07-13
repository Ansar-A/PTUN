<?php

use common\models\JenisBarang;
use common\models\StokBarang;
use common\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Pengajuan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card-body">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    $user = Yii::$app->user->identity;
    if ($user) {
        $data = User::find()->where(['id' => $user->id])->all();

        echo $form->field($model, 'get_user')->dropDownList(
            ArrayHelper::map(
                $data,
                'id',
                function ($data) {
                    return $data->username;
                }
            ),
            [
                'options' => ['disabled' => true],
            ]
        )->label('Nama');
    } else {
        echo "User not logged in.";
    }
    ?>


    <?= $form->field($model, 'get_jenis')->dropDownList(
        ArrayHelper::map(JenisBarang::find()->all(), 'id_jenis', 'jenis_barang'),
        [
            'prompt' => 'Pilih Jenis Barang',
            'onchange' => '
            var jenisBarangId = $(this).val();
            if (jenisBarangId) {
                $.ajax({
                    url: "' . Url::to(['stok-barang/lists']) . '",
                    type: "GET",
                    data: {id: jenisBarangId},
                    success: function(data) {
                        $("#' . Html::getInputId($model, 'get_barang') . '").html(data);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            }
        '
        ]
    )->label('Jenis Barang'); ?>

    <?= $form->field($model, 'get_barang')->dropDownList(
        [],
        [
            'prompt' => 'Pilih Nama Barang',
        ]
    )->label('Nama Barang'); ?>





    <!-- <?= $form->field($model, 'get_barang')->dropDownList(

                ArrayHelper::map(
                    $data = StokBarang::find()->all(),
                    'id_stok',
                    function ($data) {
                        return $data->nama_barang . ' | ' . 'Sisa = ' . $data->sisa;
                    }
                )
            )->label('Nama Barang') ?> -->

    <?= $form->field($model, 'jumlah')->textInput() ?>


    <?= $form->field($model, 'tgl_pengajuan')->textInput(['type' => 'date']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>