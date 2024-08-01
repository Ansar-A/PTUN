<?php

use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
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
            <li class="active">Data</li>
        </ul>
        <div class="card">

            <div class="card-body">
                <?php if (Yii::$app->user->identity->level === 'admin') : ?>
                    <p>
                        <!-- <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?> -->
                    </p>
                <?php else : ?>
                <?php endif ?>



                <?php // echo $this->render('_search', ['model' => $searchModel]); 
                ?>
                <?php if (Yii::$app->user->identity->level === 'admin') : ?>
                    <?= GridView::widget([
                        'summary' => false,
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'tableOptions' => ['class' => 'table-responsive table table-vcenter card-table'],
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'username',
                            'email:email',
                            // [
                            //     'attribute' =>  'get_jabatan',
                            //     'value' => function ($model) {
                            //         return $model->jabatans->jabatan;
                            //     },
                            //     'label' => 'Jabatan'
                            // ],
                            'nip',
                            'level',
                            [
                                'class' => ActionColumn::className(),
                                'headerOptions' => ['class' => 'text-center'],
                                'contentOptions' => ['style' => 'text-align:center; width:120px;'],
                                'header' => 'Action',
                                'template' => '<div class="btn-group" role="group">{view} {update} {delete}</div>',
                                'buttons' => [
                                    'view' => function ($url, $model) {
                                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'id' => $model->id], [
                                            'class' => 'btn btn-icon btn-outline-primary has-ripple',
                                            'data-toggle' => "tooltip",
                                            'data-placement' => "top",
                                            'title' => "",
                                            'data-original-title' => "View"
                                        ]);
                                    },
                                    'update' => function ($url, $model) {
                                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id' => $model->id], [
                                            'class' => 'btn btn-icon btn-outline-info has-ripple',
                                            'data-toggle' => "tooltip",
                                            'data-placement' => "top",
                                            'title' => "",
                                            'data-original-title' => "Update"
                                        ]);
                                    },
                                    'delete' => function ($url, $model) {

                                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], [
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
                        'summary' => false,
                        'dataProvider' => $dataProvider,
                        // 'filterModel' => $searchModel,
                        'tableOptions' => ['class' => 'table-responsive table table-vcenter card-table'],
                        'columns' => [
                            // ['class' => 'yii\grid\SerialColumn'],
                            'username',
                            'email:email',
                            // [
                            //     'attribute' =>  'get_jabatan',
                            //     'value' => function ($model) {
                            //         return $model->jabatans->jabatan;
                            //     },
                            //     'label' => 'Jabatan'
                            // ],
                            'nip',
                            'level',
                            [
                                'class' => ActionColumn::className(),
                                'headerOptions' => ['class' => 'text-center'],
                                'contentOptions' => ['style' => 'text-align:center; width:120px;'],
                                'header' => 'Action',
                                'template' => '<div class="btn-group" role="group">{view}</div>',
                                'buttons' => [
                                    'view' => function ($url, $model) {
                                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'id' => $model->id], [
                                            'class' => 'btn btn-icon btn-outline-primary has-ripple',
                                            'data-toggle' => "tooltip",
                                            'data-placement' => "top",
                                            'title' => "",
                                            'data-original-title' => "View"
                                        ]);
                                    },
                                    'update' => function ($url, $model) {
                                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id' => $model->id], [
                                            'class' => 'btn btn-icon btn-outline-info has-ripple',
                                            'data-toggle' => "tooltip",
                                            'data-placement' => "top",
                                            'title' => "",
                                            'data-original-title' => "Update"
                                        ]);
                                    },
                                    'delete' => function ($url, $model) {

                                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], [
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