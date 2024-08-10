<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use common\models\Jabatan;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use common\models\Unit;
$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
var_dump($model->getErrors());
?>

<div class="container container-tight py-4">
    <div class="text-center mb-4">
        <a href="." class="navbar-brand navbar-brand-autodark"><img src="<?= Url::to('@web/table/src/static/logo.svg') ?>" height="36" alt=""></a>
    </div>
    <div class="card card-md" style="width: 500px;">
        <div class="card-body">
            <h2 class="h2 text-center mb-4 " style="color: gray;">[ Register ]</h2>
            <h3 class="h3 text-center mb-4">Permintaan Alat Tulis Kantor PTUN Makassar</h3>
            <hr>
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <div class="mb-3">
                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Username'])->label('') ?>
            </div>
            <div class="mb-2">
                <?= $form->field($model, 'email')->textInput(['type' => 'email', 'placeholder' => 'Email'])->label('') ?>
            </div>
            <div class="mb-2">
                <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password'])->label('') ?>
            </div>
            <div class="mb-2">
                <?= $form->field($model, 'nip')->textInput(['type' => 'number', 'placeholder' => '18 dijid'])->label('') ?>
            </div>
            <div class="mb-2">
                    <?= $form->field($model, 'level')->dropDownList(
                        ['instansi' => 'Instansi', 'admin' => 'Admin'],
                        ['prompt' => '-- Pilih Level User --',]
                    )->label('') ?>
            </div>
            <div class="mb-2">
                    <?= $form->field($model, 'get_unit')->dropDownList(
                        ArrayHelper::map(
                            $data=Unit::find()->all(),
                            'id_unit',
                            function ($data){
                                return $data->nama_unit;
                            }
                        ),
                        ['prompt' => '-- Pilih Unit Kerja --']
                    )->label('') ?>
            </div>

            <div class="form-group" style="padding-top: 20px;">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary btn-block', 'name' => 'signup-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <div class="text-center mt-4 font-weight-light"> Already have account? <a href="<?= Url::to(['site/login']) ?>" class="text-primary">Sign In</a>
    </div>
</div>