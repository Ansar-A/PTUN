<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Pengajuan $model */

$this->title = $model->id_pengajuan;
$this->params['breadcrumbs'][] = ['label' => 'Pengajuans', 'url' => ['index']];
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
                <a href="<?= Url::to(['pengajuan/index']) ?>">
                    Pengajuan
                </a>
            </li>
            <li class="active">View Pengajuan</li>
        </ul>

        <div class="card">

            <div class="card-body">
                <p>
                    <?= Html::a('Update', ['update', 'id_pengajuan' => $model->id_pengajuan], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Delete', ['delete', 'id_pengajuan' => $model->id_pengajuan], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>

                <?= DetailView::widget([
                    'options' => ['class' => 'table'],
                    'model' => $model,
                    'attributes' => [
                        // 'id_pengajuan',

                        [
                            'attribute' => 'get_barang',
                            'label' => 'Nama Barang',
                            'value' => function ($model) {
                                return $model->barang->nama_barang;
                            }
                        ],
                        [
                            'attribute' => 'jumlah',
                            'label' => 'Jumlah yang Diajukan'
                        ],
                        [
                            'attribute' =>  'get_user',
                            'label' => 'User',
                            'value' => function ($model) {
                                return $model->user->username;
                            }
                        ],

                        'tgl_pengajuan',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>