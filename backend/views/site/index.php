<?php

/** @var yii\web\View $this */

use common\models\Pengajuan;
use common\models\Permintaan;
use common\models\StokBarang;
use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'My Yii Application';
$totalAdmin = User::find()->where(['level' => 'admin'])->count();
$totalInstansi = User::find()->where(['level' => 'instansi'])->count();
$totalPengajuan = Pengajuan::find()->count();

if (Yii::$app->user->identity->level === 'admin') {
    $totalPermintaan = Permintaan::find()->count();
} else {
    $userId = Yii::$app->user->identity->id; // Menggunakan 'id' dari identitas pengguna
    $totalPermintaan = Permintaan::find()->where(['get_user' => $userId])->count();
}
?>

<div class="container-xl">
    <div class="row row-deck row-cards">
        <div class="col-12">
            <div class="card card-md">
                <div class="card-stamp card-stamp-lg">
                    <div class="card-stamp-icon bg-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7"></path>
                            <line x1="10" y1="10" x2="10.01" y2="10"></line>
                            <line x1="14" y1="10" x2="14.01" y2="10"></line>
                            <path d="M10 14a3.5 3.5 0 0 0 4 0"></path>
                        </svg>
                    </div>
                </div>
                <div class="card-body" style="padding: 15px; padding-top:25px; padding-bottom:25px;">
                    <div class="row align-items-center">
                        <div class="col-10">
                            <h3 class="h1">Pengadilan Tata Usaha Negera Makassar</h3>
                            <div class="markdown text-muted">
                                Selamat datang di Aplikasi Permintaan Alat Tulis Kantor, memberikan kemudahan dalam permintaan dan pengelolaan segala jenis ALat Tulis Kantor dengan efektif dan efisien.
                            </div>
                            <?php if (Yii::$app->user->identity->level === 'admin') : ?>
                                <div class="mt-3">
                                    <a href="<?= Url::to(['stok-barang/index']) ?>" class="btn btn-primary">Kelola Stok</a>
                                </div>
                            <?php else : ?>
                                <div class="mt-3">
                                    <a href="<?= Url::to(['permintaan/index']) ?>" class="btn btn-primary">Ajukan Permintaan</a>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row row-cards">
                <?php if (Yii::$app->user->identity->level === 'admin') : ?>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            <?php echo $totalAdmin ?>
                                        </div>
                                        <div class="text-muted">
                                            User Admin
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            <?php echo $totalInstansi ?>
                                        </div>
                                        <div class="text-muted">
                                            User Unit Kerja
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-twitter text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-receipt" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2m4 -14h6m-6 4h6m-2 4h2" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            <?php echo $totalPermintaan ?>
                                        </div>
                                        <div class="text-muted">
                                            Data Permintaan
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-facebook text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-report" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M17 17m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                                <path d="M17 13v4h4" />
                                                <path d="M12 3v4a1 1 0 0 0 1 1h4" />
                                                <path d="M11.5 21h-6.5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v2m0 3v4" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            <?php echo $totalPengajuan ?>
                                        </div>
                                        <div class="text-muted">
                                            Data Pengajuan
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else : ?>

                    <!-- $totalPermintaan = Permintaan::find()->where(['user_id' => $userId])->count(); -->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-twitter text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-receipt" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2m4 -14h6m-6 4h6m-2 4h2" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            <?php echo $totalPermintaan ?>
                                        </div>
                                        <div class="text-muted">
                                            Data Permintaan
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endif ?>
            </div>
        </div>
        <div class="col-md-6 col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Alat Tulis Kantor</h3>
                </div>
                <table class="table card-table table-vcenter">
                    <thead>
                        <tr>
                            <th>Alat Tulis Kantor</th>
                            <!-- <th colspan="2">Jumlah</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Query untuk mendapatkan 7 peralatan dari tabel StokBarang
                        $stokBarangData = StokBarang::find()->orderBy(['stok' => SORT_DESC])->limit(7)->all();

                        // Iterasi untuk setiap peralatan
                        foreach ($stokBarangData as $item) :
                            // Hitung presentase sesuai kebutuhan (di sini hanya contoh)
                            $presentase = ($item->stok / 2000) * 100; // Contoh perhitungan presentase

                            // Output satu baris dalam tabel
                        ?>
                            <tr>
                                <td><?= Html::encode($item->nama_barang) ?></td>
                                <!-- <td><?= $item->stok ?></td> -->
                                <!-- <td class="w-50">
                                    <div class="progress progress-xs">
                                        <div class="progress-bar bg-primary" style="width: <?= $presentase ?>%"></div>
                                    </div>
                                </td> -->
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    
                </table>
                <div class="mt-3 mb-2" style="padding-left:350px">
                        <a href="/yii-ptun/backend/web/stok-barang/index" class="btn btn-primary btn-sm">MORE</a>
                    </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Permintaan Terbaru</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter">
                        <tbody>
                            <?php
                            // Query untuk mendapatkan 7 data Permintaan terbaru
                            $permintaanData = Permintaan::find()->orderBy(['tgl_permintaan' => SORT_DESC])->limit(7)->all();

                            // Iterasi untuk setiap data Permintaan
                            foreach ($permintaanData as $item) :
                                // Format tanggal sesuai kebutuhan (di sini hanya contoh)
                                $formattedDate = Yii::$app->formatter->asDate($item->tgl_permintaan, 'long'); // Contoh format tanggal

                                // Output satu baris dalam tabel
                            ?>
                                <tr>
                                    <td class="w-100">
                                        <a href="#" class="text-reset"><?= Html::encode($item->stokBarang->nama_barang) ?></a>
                                    </td>
                                    <td class="text-nowrap text-muted">
                                        <!-- Ikona tanggal -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <rect x="4" y="5" width="16" height="16" rx="2"></rect>
                                            <line x1="16" y1="3" x2="16" y2="7"></line>
                                            <line x1="8" y1="3" x2="8" y2="7"></line>
                                            <line x1="4" y1="11" x2="20" y2="11"></line>
                                            <line x1="11" y1="15" x2="12" y2="15"></line>
                                            <line x1="12" y1="15" x2="12" y2="18"></line>
                                        </svg>
                                        <?= $formattedDate ?>
                                    </td>
                                    <td class="text-nowrap">
                                        <a href="<?= Url::to(['permintaan/index']) ?>" class="text-muted">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/message -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4"></path>
                                                <line x1="8" y1="9" x2="16" y2="9"></line>
                                                <line x1="8" y1="13" x2="14" y2="13"></line>
                                            </svg>
                                            new
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>