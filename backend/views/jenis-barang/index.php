<?php

use common\models\JenisBarang;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\JenisBarangSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Jenis Barangs';
$this->params['breadcrumbs'][] = $this->title;
$total = JenisBarang::find()->count();
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
                                <?php echo $total ?>
                            </div>
                            <div class="text-muted">
                                Total Jenis ATK
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <p>
                    <?= Html::a('Create Jenis ATK', ['create'], ['class' => 'btn btn-outline-success w-20']) ?>
                </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); 
                ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'summary' => false,
                    'tableOptions' => ['class' => 'table-responsive table table-vcenter card-table'],
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn', 'header' => 'No'],

                        // 'id_jenis',
                        [
                            'attribute' => 'jenis_barang',
                            'label' => 'Jenis ATK'
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
                                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'id_jenis' => $model->id_jenis], [
                                        'class' => 'btn btn-icon btn-outline-primary has-ripple',
                                        'data-toggle' => "tooltip",
                                        'data-placement' => "top",
                                        'title' => "",
                                        'data-original-title' => "View"
                                    ]);
                                },
                                'update' => function ($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id_jenis' => $model->id_jenis], [
                                        'class' => 'btn btn-icon btn-outline-info has-ripple',
                                        'data-toggle' => "tooltip",
                                        'data-placement' => "top",
                                        'title' => "",
                                        'data-original-title' => "Update"
                                    ]);
                                },
                                'delete' => function ($url, $model) {

                                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id_jenis' => $model->id_jenis], [
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