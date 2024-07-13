<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PermintaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Stok Barang';
$this->params['breadcrumbs'][] = $this->title;
?>
<html>

<head>
    <title>Print Invoice</title>
    <style>
        .page {
            padding: 2cm;
        }

        table {
            border-spacing: 0;
            border-collapse: collapse;
            width: 100%;
        }

        table td,
        table th {
            border: 1px solid #ccc;
        }

        table th {
            background-color: gray;
        }
    </style>
</head>
<div class="page">
    <div style="text-align: center; padding-bottom:10px;">
        <h3><?= Html::encode($this->title) ?></h3>
        <p>Peralatan Kantor PTUN Makassar</p>
        <hr>
    </div>
    <table border="0" style="margin: auto;">
        <thead>
            <tr>
                <th style="text-align: center;">No</th>
                <th style="text-align: center;">Kode</th>
                <th style="text-align: center;">Nama Barang</th>
                <th style="text-align: center;">Satuan</th>
                <th style="text-align: center;">Stok</th>
                <th style="text-align: center;">Sisa</th>
                <th style="text-align: center;">Jenis Barang</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($dataProvider->getModels() as $model) : ?>
                <tr>
                    <td style="text-align: center;"><?= $no++ ?></td>
                    <td style="text-align: center;"><?= $model->kode ?></td>
                    <td style="text-align: center;"><?= $model->nama_barang ?></td>
                    <td style="text-align: center;"><?= $model->satuan ?></td>
                    <td style="text-align: center;"><?= $model->stok ?></td>
                    <td style="text-align: center;"><?= $model->sisa ?></td>
                    <td style="text-align: center;"><?= $model->jenis->jenis_barang ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>