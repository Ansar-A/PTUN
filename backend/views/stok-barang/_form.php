<?php

use common\models\JenisBarang;
use common\models\Permintaan;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\StokBarang $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="card-body">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create Data</h3>
                </div>
                <div class="card-body">
                    <?php
                    // Fungsi untuk menghasilkan kode barang otomatis dengan format BRG-001
                    function generateBarangCode($prefix = 'BRG-', $length = 3)
                    {
                        // Mendapatkan nomor urut terakhir dari database atau penyimpanan data lainnya
                        // Contoh sederhana menggunakan nomor acak untuk ilustrasi
                        $lastNumber = rand(1, 999);

                        // Menghasilkan nomor urut dengan padding nol
                        $formattedNumber = sprintf('%0' . $length . 'd', $lastNumber);

                        // Menggabungkan prefix dan nomor urut
                        $barcode = $prefix . $formattedNumber;

                        return $barcode;
                    }

                    // Mendapatkan kode barang otomatis dengan format BRG-001
                    $kodeBarangOtomatis = generateBarangCode();
                    ?>

                    <!-- Formulir -->
                    <div class="col-md-6">
                        <?= $form->field($model, 'kode')->textInput(['maxlength' => true, 'value' => $kodeBarangOtomatis]) ?>
                    </div>

                    <div class="col-md-6">
                        <?= $form->field($model, 'nama_barang')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'satuan')->textInput(['placeholder' => 'Masukkan Satuan...']) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'stok')->textInput(['id' => 'stok-input']) ?>
                    </div>

                    <div class="col-md-6">
                        <?= $form->field($model, 'sisa')->textInput(['readonly' => true, 'id' => 'sisa-input']) ?>
                    </div>
                    <div class="col-md-6">
                        <?php
                        $data = JenisBarang::find()->all();
                        echo $form->field($model, 'get_jenis')->dropDownList(
                            ArrayHelper::map(
                                $data,
                                'id_jenis',
                                function ($data) {
                                    return $data->jenis_barang;
                                }
                            ),
                            ['prompt' => 'pilih Jenis Barang...']
                        )->label('Jenis Barang') ?>
                    </div>
                    <?php
$this->registerJs(<<<JS
    window.onload = function() {
        var today = new Date();
        var day = ('0' + today.getDate()).slice(-2);
        var month = ('0' + (today.getMonth() + 1)).slice(-2);
        var year = today.getFullYear();
        var todayString = year + '-' + month + '-' + day;
        document.getElementById('tgl-pembuatan').value = todayString;
    };
JS);
?>


                    <div class="col-md-12">
    <?= $form->field($model, 'tgl_pembuatan')->textInput(['type' => 'date', 'id' => 'tgl-pembuatan']) ?>
</div>

                </div>
            </div>


        </div>
        <div class="col-md-4">
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
                            <div class="datagrid-title">Code</div>
                            <div class="datagrid-content">
                                <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l5 5l10 -10"></path>
                                </svg>
                                Kode Barang Otomatis
                            </div>
                        </div>

                        <div class="datagrid-item">
                            <div class="datagrid-title">more description</div>
                            <div class="datagrid-content">
                                Silahkan lakukan penginputan data Stok Barang berdasarkan form yang disediakan.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group" style="padding-top: 10px;">
        <?= Html::submitButton('Save Data', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>