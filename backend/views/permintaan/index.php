<?php

use common\models\Permintaan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;

use yii\bootstrap\ActiveForm;
use yii\grid\GridView;


/** @var yii\web\View $this */
/** @var backend\models\PermintaanSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Permintaans';
$this->params['breadcrumbs'][] = $this->title;
if (Yii::$app->user->identity->level === 'admin') {
    $totalDisetujui = Permintaan::find()->where(['status_permintaan' => 'disetujui'])->count();
} else {
    $userId = Yii::$app->user->identity->id;
    $totalDisetujui = Permintaan::find()->where(['status_permintaan' => 'disetujui','get_user' => $userId])->count();
}

if (Yii::$app->user->identity->level === 'admin') {
    $totalMenunggu = Permintaan::find()->where(['status_permintaan' => 'menunggu'])->count();
} else {
    $userId = Yii::$app->user->identity->id;
    $totalMenunggu = Permintaan::find()->where(['status_permintaan' => 'menunggu','get_user' => $userId])->count();
   
}


if (Yii::$app->user->identity->level === 'admin') {
    $totalPermintaan = Permintaan::find()->count();
} else {
    $userId = Yii::$app->user->identity->id; // Menggunakan 'id' dari identitas pengguna
    $totalPermintaan = Permintaan::find()->where(['get_user' => $userId])->count();
}

?>
<div class="page-body">
    <div class="container-xl">
        <ul class="breadcrumb mb-4">
            <li>
                <a class="nav-link" href="<?= Url::to(['site/index']) ?>">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
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
                <a href="<?= Url::to(['permintaan/index']) ?>">
                    Permintaan
                </a>
            </li>
            <li class="active">Data</li>
        </ul>
        <div class="row" style="padding-bottom: 20px;">
            <div class="col-md-6 col-xl-4">
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
                                    <?php echo $totalDisetujui ?>
                                </div>
                                <div class="text-muted">
                                    Permintaan Disetujui
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chart-arrows-vertical" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M18 21v-14" />
                                        <path d="M9 15l3 -3l3 3" />
                                        <path d="M15 10l3 -3l3 3" />
                                        <path d="M3 21l18 0" />
                                        <path d="M12 21l0 -9" />
                                        <path d="M3 6l3 -3l3 3" />
                                        <path d="M6 21v-18" />
                                    </svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    <?php echo $totalPermintaan ?>
                                </div>
                                <div class="text-muted">
                                    Permintaan
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
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
                                    <?php echo $totalMenunggu ?>
                                </div>
                                <div class="text-muted">
                                    Permintaan Menunggu
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
                    <?php $form = ActiveForm::begin([
                        'method' => 'get',
                    ]); ?>
                    <div class="row" style="margin-left:270px;">
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

        <?php else : ?>
            <p>
                <?= Html::a('Create Permintaan', ['create'], ['class' => 'btn btn-outline-success w-20']) ?>
            </p>
        <?php endif ?>
        <?php if (Yii::$app->user->identity->level === 'admin') : ?>
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

                     
                    [
                        'attribute' =>  'get_user',
                        'label' => 'Nama',
                        'value' => function ($model) {
                            return $model->user->username;
                        }
                    ],
                    [
                        'attribute' =>  'get_user',
                        'label' => 'Unit Kerja',
                        'value' => function ($model) {
                            return $model->user->unit->nama_unit;
                        }
                    ],
                    [
                        'attribute' => 'get_barang',
                        'label' => 'Nama Barang',
                        'value' => function ($model) {
                            return $model->stokBarang->nama_barang;
                        }
                    ],
                    [
                        'attribute' => 'jumlah',
                        'label' => 'Jumlah Pesanan',
                    ],
                    [
                        'contentOptions' => ['style' => 'text-align:center;'],
                        'headerOptions' => ['class' => 'text-center'],
                        'attribute' => 'status_permintaan',
                        'format' => 'raw',
                        'value' => function ($data, $key, $index, $column) {
                            $labelClass = '';
                            $labelText = '';

                            switch ($data->status_permintaan) {
                                case 'menunggu':
                                    $labelClass = 'badge badge-outline text-blue'; // You can customize the CSS classes
                                    $labelText = 'Menunggu';
                                    break;
                                case 'proses':
                                    $labelClass = 'badge badge-outline text-yellow'; // You can customize the CSS classes
                                    $labelText = 'Proses';
                                    break;
                                case 'disetujui':
                                    $labelClass = 'badge badge-outline text-teal'; // You can customize the CSS classes
                                    $labelText = 'Disetujui';
                                    break;
                                default:
                                    $labelText = 'Undefined';
                                    break;
                            }

                            return \yii\helpers\Html::tag('span', $labelText, ['class' => $labelClass]);
                        },
                    ],
                    'ket',
                    [
                        'attribute' => 'tgl_permintaan',
                        'label' => 'Tanggal Permintaan',
                        'value' => function ($model) {
                            return date('Y-m-d', strtotime($model->tgl_permintaan));
                        },
                    ],
                    [
                        'class' => ActionColumn::className(),
                        'headerOptions' => ['class' => 'text-center'],
                        'contentOptions' => ['style' => 'text-align:center;'],
                        'header' => 'Action',
                        'template' => '<div class="btn-group" role="group">{view} {update} {delete}</div>',
                        'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'id_permintaan' => $model->id_permintaan], [
                                    'class' => 'btn btn-icon btn-outline-primary has-ripple',
                                    'data-toggle' => "tooltip",
                                    'data-placement' => "top",
                                    'title' => "",
                                    'data-original-title' => "View"
                                ]);
                            },
                            'update' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id_permintaan' => $model->id_permintaan], [
                                    'class' => 'btn btn-icon btn-outline-info has-ripple',
                                    'data-toggle' => "tooltip",
                                    'data-placement' => "top",
                                    'title' => "",
                                    'data-original-title' => "Update"
                                ]);
                            },
                            'delete' => function ($url, $model) {

                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id_permintaan' => $model->id_permintaan], [
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
                'summary' => false,
                'tableOptions' => ['class' => 'table-responsive table table-vcenter card-table'],
                'columns' => [
                    [
                        'class' => 'yii\grid\SerialColumn',
                        'header' => 'No'
                    ],

                    // 'id_permintaan',
                    // [
                    //     'attribute' =>  'get_user',
                    //     'label' => 'Nama',
                    //     'value' => function ($model) {
                    //         return $model->user->username;
                    //     }
                    // ],
                    [
                        'attribute' => 'get_barang',
                        'label' => 'Nama Barang',
                        'value' => function ($model) {
                            return $model->stokBarang->nama_barang;
                        }
                    ],
                    [
                        'attribute' => 'jumlah',
                        'label' => 'Jumlah Pesanan',
                    ],
                    [
                        'contentOptions' => ['style' => 'text-align:center;'],
                        'headerOptions' => ['class' => 'text-center'],
                        'attribute' => 'status_permintaan',
                        'format' => 'raw',
                        'value' => function ($data, $key, $index, $column) {
                            $labelClass = '';
                            $labelText = '';

                            switch ($data->status_permintaan) {
                                case 'menunggu':
                                    $labelClass = 'badge badge-outline text-blue'; // You can customize the CSS classes
                                    $labelText = 'Menunggu';
                                    break;
                                case 'proses':
                                    $labelClass = 'badge badge-outline text-yellow'; // You can customize the CSS classes
                                    $labelText = 'Proses';
                                    break;
                                case 'disetujui':
                                    $labelClass = 'badge badge-outline text-teal'; // You can customize the CSS classes
                                    $labelText = 'Disetujui';
                                    break;
                                default:
                                    $labelText = 'Undefined';
                                    break;
                            }

                            return \yii\helpers\Html::tag('span', $labelText, ['class' => $labelClass]);
                        },
                    ],

                    [
                        'class' => ActionColumn::className(),
                        'headerOptions' => ['class' => 'text-center'],
                        'contentOptions' => ['style' => 'text-align:center;'],
                        'header' => 'Action',
                        'template' => '<div class="btn-group" role="group">{view} {update} {delete}</div>',
                        'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'id_permintaan' => $model->id_permintaan], [
                                    'class' => 'btn btn-icon btn-outline-primary has-ripple',
                                    'data-toggle' => "tooltip",
                                    'data-placement' => "top",
                                    'title' => "",
                                    'data-original-title' => "View"
                                ]);
                            },
                            'update' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id_permintaan' => $model->id_permintaan], [
                                    'class' => 'btn btn-icon btn-outline-info has-ripple',
                                    'data-toggle' => "tooltip",
                                    'data-placement' => "top",
                                    'title' => "",
                                    'data-original-title' => "Update"
                                ]);
                            },
                            'delete' => function ($url, $model) {

                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id_permintaan' => $model->id_permintaan], [
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