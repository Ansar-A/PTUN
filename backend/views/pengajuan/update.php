<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Pengajuan $model */

$this->title = 'Update Pengajuan: ' . $model->id_pengajuan;
$this->params['breadcrumbs'][] = ['label' => 'Pengajuans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pengajuan, 'url' => ['view', 'id_pengajuan' => $model->id_pengajuan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pengajuan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
