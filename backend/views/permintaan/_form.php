<?php

use common\models\JenisBarang;
use common\models\Permintaan;
use common\models\StokBarang;
use common\models\User;
use kartik\depdrop\DepDrop;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Permintaan $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="card-body">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-8">
            <?php if (Yii::$app->user->identity->level === 'admin') : ?>
                <div class="col-md-4">
                    <?php
                    $user = Yii::$app->user->identity;
                    if ($user) {
                        $data = User::find()->all();

                        echo $form->field($model, 'get_user')->dropDownList(
                            ArrayHelper::map(
                                $data,
                                'id',
                                function ($data) {
                                    return $data->username;
                                }
                            ),

                        )->label('Nama');
                    } else {
                        // Handle the case when the user is not logged in or the identity is null
                        echo "User not logged in.";
                    }
                    ?>
                </div>
                <div class="col-md-4">
                    <?php
                    $user = Yii::$app->user->identity;
                    if ($user) {
                        $data = User::find()->all();

                        if ($data) {
                            echo $form->field($model, 'get_user')->dropDownList(
                                ArrayHelper::map(
                                    $data,
                                    'id',
                                    function ($data) {
                                        return $data->jabatans->jabatan;
                                    }
                                ),

                            )->label('Jabatan');
                        } else {
                            echo "No user data found.";
                        }
                    } else {
                        echo "User not logged in.";
                    }
                    ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'get_jenis')->dropDownList(
                        ArrayHelper::map(
                            JenisBarang::find()->all(),
                            'id_jenis',
                            'jenis_barang'
                        ),
                    )->label('Jenis Barang'); ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'get_barang')->dropDownList(
                        ArrayHelper::map(
                            StokBarang::find()->all(),
                            'id_stok',
                            'nama_barang'
                        ),
                    )->label('Nama Barang'); ?>
                </div>
            <?php else : ?>
                <div class="col-md-4">
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
                        // Handle the case when the user is not logged in or the identity is null
                        echo "User not logged in.";
                    }
                    ?>
                </div>
                <div class="col-md-4">
                    <?php
                    $user = Yii::$app->user->identity;

                    if ($user) {
                        $data = User::find()->where(['id' => $user->id])->all();

                        if ($data) {
                            echo $form->field($model, 'get_user')->dropDownList(
                                ArrayHelper::map(
                                    $data,
                                    'id',
                                    function ($data) {
                                        return $data->jabatans->jabatan;
                                    }
                                ),
                                [
                                    'options' => ['disabled' => true],
                                ]
                            )->label('Jabatan');
                        } else {
                            echo "No user data found.";
                        }
                    } else {
                        echo "User not logged in.";
                    }
                    ?>
                </div>
                <div class="col-md-4">
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
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'get_barang')->dropDownList(
                        [],
                        [
                            'prompt' => 'Pilih Nama Barang',
                        ]
                    )->label('Nama Barang'); ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'tgl_permintaan')->textInput(['type' => 'date']) ?>
                </div>
            <?php endif ?>

            <div class="col-md-4">
                <?= $form->field($model, 'jumlah')->textInput([
                    'type' => 'number',
                    'placeholder' => 'tidak boleh melebihi sisa barang',
                    'oninput' => '
                        var selectedOption = $("select#' . Html::getInputId($model, 'get_barang') . '").find("option:selected");
                        var sisaValue = selectedOption.data("sisa");
                        var inputJumlah = $(this).val();

                        if (inputJumlah > sisaValue) {
                            alert("Jumlah tidak boleh melebihi sisa barang!");
                            $(this).val(""); // Reset the input value
                        }
                    '
                ])->label('Jumlah yang diinginkan...') ?>
            </div>
            <?php if (Yii::$app->user->identity->level === 'admin') : ?>
                <div class="col-md-4">
                    <?= $form->field($model, 'status_permintaan')->dropDownList(
                        [
                            'menunggu' => 'Menunggu...',
                            'proses' => 'Proses..',
                            'disetujui' => 'Disetujui',
                        ],
                        [
                            'prompt' => 'Pilih Status Permintaan',
                        ]
                    ) ?>
                </div>
            <?php else : ?>
            <?php endif ?>
            <div class="col-md-12">
                <?= $form->field($model, 'ket')->textarea() ?>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Base info</h3>
                </div>
                <div class="card-body">
                    <div class="datagrid">
                        <div class="datagrid-item">
                            <div class="datagrid-title"><?php echo Yii::$app->user->identity->username ?></div>
                            <div class="datagrid-content">
                                <span class="status status-green">
                                    Active
                                </span>
                            </div>
                        </div>
                        <div class="datagrid-item">

                            <button class="btn position-relative">
                                <div class="datagrid-title" id="sisaBarang">SISA BARANG</div>
                                <span class="badge bg-yellow badge-notification badge-blink"></span>
                            </button>
                        </div>


                        <div class="datagrid-item">
                            <div class="datagrid-title">more description</div>
                            <div class="datagrid-content">
                                Perhatikan sisa stok barang yang tersedia, tidak boleh melebihi sisa stok.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- <?= $form->field($model, 'tgl_permintaan')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>