<?php

use common\models\JenisBarang;
use common\models\StokBarang;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\StokBarangSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Stok Barangs';
$this->params['breadcrumbs'][] = $this->title;
$totalTerisi = StokBarang::find()->where(['not', ['sisa' => 0]])->count();
$totalHabis = StokBarang::find()->where(['sisa' => 0])->count();
$totalStok = StokBarang::find()->count();
$totalJenis = JenisBarang::find()->count();
?>
<html>
<style>
    .breadcrumb {
        margin: 25px 0;
    }
</style>

</html>
<div class="page-body">
    <div class="container-xl">
        <ul class="breadcrumb">
            <li>
                <a class="nav-link" href="<?= Url::to(['site/index']) ?>">
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                        </svg>
                    </span>
                    Home
                </a>
            </li>
            <li>
                <a href="<?= Url::to(['stok-barang/index']) ?>">
                    Stok Barang
                </a>
            </li>
            <li class="active">Data Stok</li>
        </ul>
        <div class="row" style="padding-bottom: 20px;">
            <div class="col-md-6 col-xl-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-green-lt avatar"><!-- Download SVG icon from http://tabler-icons.io/i/arrow-up -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="18" y1="11" x2="12" y2="5"></line>
                                        <line x1="6" y1="11" x2="12" y2="5"></line>
                                    </svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    <?php echo $totalTerisi ?>
                                </div>
                                <div class="text-muted">
                                    Total Stok Terisi
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-abacus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M5 3v18" />
                                        <path d="M19 21v-18" />
                                        <path d="M5 7h14" />
                                        <path d="M5 15h14" />
                                        <path d="M8 13v4" />
                                        <path d="M11 13v4" />
                                        <path d="M16 13v4" />
                                        <path d="M14 5v4" />
                                        <path d="M11 5v4" />
                                        <path d="M8 5v4" />
                                        <path d="M3 21h18" />
                                    </svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    <?php echo $totalStok ?>
                                </div>
                                <div class="text-muted">
                                    Total Stok
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-red-lt avatar"><!-- Download SVG icon from http://tabler-icons.io/i/arrow-down -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="18" y1="13" x2="12" y2="19"></line>
                                        <line x1="6" y1="13" x2="12" y2="19"></line>
                                    </svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    <?php echo $totalHabis ?>
                                </div>
                                <div class="text-muted">
                                    Total Stok Habis
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-yellow text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/message -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chart-dots-3" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M5 7m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path d="M16 15m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path d="M18 6m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                        <path d="M6 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                        <path d="M9 17l5 -1.5" />
                                        <path d="M6.5 8.5l7.81 5.37" />
                                        <path d="M7 7l8 -1" />
                                    </svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    <?php echo $totalJenis ?>
                                </div>
                                <div class="text-muted">
                                    Jenis Barang
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">

            <div class="card-body">
                <?php if (Yii::$app->user->identity->level === 'admin') : ?>
                    <p>
                        <?= Html::a('Create Stok Barang', ['create'], ['class' => 'btn btn-outline-success w-20']) ?>
                        <?= Html::a('Export to PDF', ['export-pdf'], ['class' => 'btn btn-primary', 'id' => 'export-pdf-btn', 'target' => '_blank']) ?>
                    </p>
                <?php else : ?>
                <?php endif ?>
                <?php // echo $this->render('_search', ['model' => $searchModel]); 
                ?>
<?php if (Yii::$app->user->identity->level === 'admin') : ?>
    <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'tableOptions' => ['class' => 'table-responsive table table-vcenter card-table'],
                    'summary' => false,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn', 'header' => 'No'],
                        [
                            'attribute' =>  'kode',
                            'headerOptions' => ['class' => 'text-center'],
                            'contentOptions' => ['style' => 'text-align:center;'],
                        ],
                        [
                            'attribute' =>  'nama_barang',
                            'headerOptions' => ['class' => 'text-center'],
                            'contentOptions' => ['style' => 'text-align:center; width:220px;'],
                        ],
                        'satuan',
                        'stok',
                        // [
                        //     'attribute' => 'sisa',
                        //     'value' => function ($model) {
                        //         $totalPermintaanDisetujui = 0;

                        //         foreach ($model->permintaans as $permintaan) {
                        //             if ($permintaan->status_permintaan === 'disetujui') {
                        //                 $totalPermintaanDisetujui += $permintaan->jumlah;
                        //             }
                        //         }

                        //         $nilaiSisa = $model->sisa - $totalPermintaanDisetujui;

                        //         $nilaiSisa = max(0, $nilaiSisa);

                        //         $model->sisa = $nilaiSisa;


                        //         $model->save();

                        //         return $nilaiSisa;
                        //     }
                        // ],
                        [
                            'attribute' => 'sisa',
                            'value' => function ($model) {
                                $totalPermintaanDisetujui = 0;
                        
                                foreach ($model->permintaans as $permintaan) {
                                    if ($permintaan->status_permintaan === 'disetujui') {
                                        $totalPermintaanDisetujui += $permintaan->jumlah;
                                    }
                                }
                        
                                // Hitung nilai sisa dengan mengurangkan totalPermintaanDisetujui
                                $nilaiSisa = $model->sisa - $totalPermintaanDisetujui;
                        
                                // Pastikan nilai sisa tidak kurang dari 0
                                $nilaiSisa = max(0, $nilaiSisa);
                        
                                // Kembalikan nilai sisa yang sudah dihitung tanpa menyimpan perubahan ke database
                                return $nilaiSisa;
                            }
                        ],
                        


                        [
                            'attribute' => 'get_jenis',
                            'value' => function ($model) {
                                return $model->jenis->jenis_barang;
                            },
                            'label' => 'Jenis Barang'
                        ],

                        [
                            'class' => ActionColumn::className(),
                            'headerOptions' => ['class' => 'text-center'],
                            'contentOptions' => ['style' => 'text-align:center; width:120px;'],
                            'header' => 'Action',
                            'template' => '<div class="btn-group" role="group">{view} {update} {delete}</div>',
                            'buttons' => [
                                // 'class' => 'btn btn-primary dropdown-toggle',
                                'view' => function ($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'id_stok' => $model->id_stok], [
                                        'class' => 'btn btn-icon btn-outline-primary has-ripple',
                                        'data-toggle' => "tooltip",
                                        'data-placement' => "top",
                                        'title' => "",
                                        'data-original-title' => "View"
                                    ]);
                                },
                                'update' => function ($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id_stok' => $model->id_stok], [
                                        'class' => 'btn btn-icon btn-outline-info has-ripple',
                                        'data-toggle' => "tooltip",
                                        'data-placement' => "top",
                                        'title' => "",
                                        'data-original-title' => "Update"
                                    ]);
                                },
                                'delete' => function ($url, $model) {

                                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id_stok' => $model->id_stok], [
                                        'class' => 'btn btn-icon btn-outline-danger has-ripple ',
                                        'data-toggle' => "tooltip",
                                        'data-placement' => "top",
                                        'title' => "",
                                        'data-original-title' => "Delete",
                                        'data' => [
                                            'confirm' => 'Apakah Anda yakin ingin menghapus item ini?',
                                            'method' => 'post',
                                        ],
                                    ]);
                                },
                            ],
                        ],

                    ],
                ]); ?>
    <?php else : ?>
        <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'tableOptions' => ['class' => 'table-responsive table table-vcenter card-table'],
                    'summary' => false,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn', 'header' => 'No'],
                        [
                            'attribute' =>  'kode',
                            'headerOptions' => ['class' => 'text-center'],
                            'contentOptions' => ['style' => 'text-align:center;'],
                        ],
                        [
                            'attribute' =>  'nama_barang',
                            'headerOptions' => ['class' => 'text-center'],
                            'contentOptions' => ['style' => 'text-align:center; width:220px;'],
                        ],
                        'satuan',
                        'stok',
                        // [
                        //     'attribute' => 'sisa',
                        //     'value' => function ($model) {
                        //         $totalPermintaanDisetujui = 0;

                        //         foreach ($model->permintaans as $permintaan) {
                        //             if ($permintaan->status_permintaan === 'disetujui') {
                        //                 $totalPermintaanDisetujui += $permintaan->jumlah;
                        //             }
                        //         }

                        //         $nilaiSisa = $model->sisa - $totalPermintaanDisetujui;

                        //         $nilaiSisa = max(0, $nilaiSisa);

                        //         $model->sisa = $nilaiSisa;


                        //         $model->save();

                        //         return $nilaiSisa;
                        //     }
                        // ],
                        [
                            'attribute' => 'sisa',
                            'value' => function ($model) {
                                $totalPermintaanDisetujui = 0;

                                foreach ($model->permintaans as $permintaan) {
                                    if ($permintaan->status_permintaan === 'disetujui') {
                                        $totalPermintaanDisetujui += $permintaan->jumlah;
                                    }
                                }

                                // Update nilai 'sisa' dengan mengurangkan totalPermintaanDisetujui
                                $nilaiSisa = $model->sisa - $totalPermintaanDisetujui;

                                // Pastikan nilai sisa tidak kurang dari 0
                                $nilaiSisa = max(0, $nilaiSisa);

                                // Update nilai sisa di model
                                $model->sisa = $nilaiSisa;

                                // Simpan model untuk mengupdate nilai sisa di database
                                $model->save();

                                // Kembalikan nilai sisa yang sudah diupdate
                                return $nilaiSisa;
                            }
                        ],


                        [
                            'attribute' => 'get_jenis',
                            'value' => function ($model) {
                                return $model->jenis->jenis_barang;
                            },
                            'label' => 'Jenis Barang'
                        ],

                        [
                            'class' => ActionColumn::className(),
                            'headerOptions' => ['class' => 'text-center'],
                            'contentOptions' => ['style' => 'text-align:center; width:120px;'],
                            'header' => 'Action',
                            'template' => '<div class="btn-group" role="group">{view}</div>',
                            'buttons' => [
                                // 'class' => 'btn btn-primary dropdown-toggle',
                                'view' => function ($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'id_stok' => $model->id_stok], [
                                        'class' => 'btn btn-icon btn-outline-primary has-ripple',
                                        'data-toggle' => "tooltip",
                                        'data-placement' => "top",
                                        'title' => "",
                                        'data-original-title' => "View"
                                    ]);
                                },
                                'update' => function ($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id_stok' => $model->id_stok], [
                                        'class' => 'btn btn-icon btn-outline-info has-ripple',
                                        'data-toggle' => "tooltip",
                                        'data-placement' => "top",
                                        'title' => "",
                                        'data-original-title' => "Update"
                                    ]);
                                },
                                'delete' => function ($url, $model) {

                                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id_stok' => $model->id_stok], [
                                        'class' => 'btn btn-icon btn-outline-danger has-ripple ',
                                        'data-toggle' => "tooltip",
                                        'data-placement' => "top",
                                        'title' => "",
                                        'data-original-title' => "Delete",
                                        'data' => [
                                            'confirm' => 'Apakah Anda yakin ingin menghapus item ini?',
                                            'method' => 'post',
                                        ],
                                    ]);
                                },
                            ],
                        ],

                    ],
                ]); ?>
                <?php endif ?>
               
            </div>
        </div>
    </div>

</div>