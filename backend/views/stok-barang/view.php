<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\StokBarang $model */

$this->title = $model->id_stok;
$this->params['breadcrumbs'][] = ['label' => 'Stok Barangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
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
                <a href="<?= Url::to(['stok-barang/index']) ?>">
                    Stok Barang
                </a>
            </li>
            <li class="active">View Stok Barang</li>
        </ul>

        <div class="card">

            <div class="card-body">
                <p>
                <?php if (Yii::$app->user->identity->level === 'admin') : ?>
                    <?= Html::a('Update', ['update', 'id_stok' => $model->id_stok], ['class' => 'btn btn-outline-primary w-20']) ?>
                    <?= Html::a('Delete', ['delete', 'id_stok' => $model->id_stok], [
                        'class' => 'btn btn-outline-danger w-20',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                    <?php else : ?>
                <?php endif ?>
                   
                </p>
               
                <?= DetailView::widget([
                    'options' => ['class' => 'table'],
                    'model' => $model,
                    'attributes' => [
                        // 'id_stok',
                        'kode',
                        'nama_barang',
                        'satuan',
                        'stok',
                        'sisa',
                        'tgl_pembuatan',
                        [
                            'label' => 'Jenis Barang',
                            'attribute' =>      'get_jenis',
                            'value' => function ($model) {
                                return $model->jenis->jenis_barang;
                            }
                        ]
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>