<?php

use common\models\Pengajuan;
use common\models\StokBarang;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\PengajuanSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pengajuans';
$this->params['breadcrumbs'][] = $this->title;
$totalPengajuan = Pengajuan::find()->count();
$totalStok = StokBarang::find()->count();
?>
<div class="page-body">
    <div class="container-xl">
        <ul class="breadcrumb" style="padding-bottom: 20px;">
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
                <a href="<?= Url::to(['pengajuan/index']) ?>">
                    Pengajuan
                </a>
            </li>
            <li class="active">Data</li>
        </ul>
        <div class="row" style="padding-bottom: 20px;">
            <div class="col-md-6 col-xl-6">
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
                                    <?php echo $totalPengajuan ?>
                                </div>
                                <div class="text-muted">
                                    Pengajuan
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-6">
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
                                    Stok Barang
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3" style="padding-top: 18px;">
                        <?= Html::a('Create Pengajuan', ['create'], ['class' => 'btn btn-outline-success w-20']) ?>
                    </div>
                    <div class="col-md-9">
                        <?php $form = ActiveForm::begin([
                            'method' => 'get',
                        ]); ?>
                        <div class="row" style="margin-left: 10px;">
                            <div class="col-md-4">
                                <?= $form->field($searchModel, 'startDate')->textInput(['type' => 'date'])->label('') ?>
                            </div>
                            <div class="col-md-4">
                                <?= $form->field($searchModel, 'endDate')->textInput(['type' => 'date'])->label('') ?>
                            </div>
                            <div class="col-md-4" style="padding-top: 18px;">
                                <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                                <?= Html::a('Export to PDF', ['export-pdf', 'startDate' => $searchModel->startDate, 'endDate' => $searchModel->endDate], ['class' => 'btn btn-success', 'target' => '_blank']) ?>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
                <?php // echo $this->render('_search', ['model' => $searchModel]); 
                ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'summary' => false,
                    'tableOptions' => ['class' => 'table-responsive table table-vcenter card-table'],
                    'columns' => [
                        [
                            'class' => 'yii\grid\SerialColumn',
                            'header' => 'No'
                        ],
                        // 'id_pengajuan',
                        [
                            'attribute' => 'get_barang',
                            'value' => function ($model) {
                                return $model->barang->nama_barang;
                            },
                            'label' => 'Nama Barang'
                        ],

                        [
                            'attribute' =>   'jumlah',
                            'label' => 'Jumlah Pengajuan'
                        ],
                        [
                            'attribute' =>  'get_user',
                            'value' => function ($model) {
                                return $model->user->username;
                            },
                            'label' => 'User'
                        ],

                        'tgl_pengajuan',
                        [
                            'class' => ActionColumn::className(),
                            'headerOptions' => ['class' => 'text-center'],
                            'contentOptions' => ['style' => 'text-align:center; width:120px;'],
                            'header' => 'Action',
                            'template' => '<div class="btn-group" role="group">{view} {update} {delete}</div>',
                            'buttons' => [
                                // 'class' => 'btn btn-primary dropdown-toggle',
                                'view' => function ($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'id_pengajuan' => $model->id_pengajuan], [
                                        'class' => 'btn btn-icon btn-outline-primary has-ripple',
                                        'data-toggle' => "tooltip",
                                        'data-placement' => "top",
                                        'title' => "",
                                        'data-original-title' => "View"
                                    ]);
                                },
                                'update' => function ($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id_pengajuan' => $model->id_pengajuan], [
                                        'class' => 'btn btn-icon btn-outline-info has-ripple',
                                        'data-toggle' => "tooltip",
                                        'data-placement' => "top",
                                        'title' => "",
                                        'data-original-title' => "Update"
                                    ]);
                                },
                                'delete' => function ($url, $model) {

                                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id_pengajuan' => $model->id_pengajuan], [
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
            </div>
        </div>
    </div>
</div>