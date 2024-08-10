<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Unit $model */

$this->title = 'Update Unit: ' . $model->id_unit;
$this->params['breadcrumbs'][] = ['label' => 'Units', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_unit, 'url' => ['view', 'id_unit' => $model->id_unit]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="unit-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
