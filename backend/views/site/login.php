<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\Url;

$this->title = 'Login';
?>
<div class="container container-tight py-4">
    <div class="text-center mb-4">
        <a href="." class="navbar-brand navbar-brand-autodark"><img src="<?= Url::to('@web/table/src/static/logo.svg') ?>" height="36" alt=""></a>
    </div>
    <div class="card card-md">
        <div class="card-body">
            <h2 class="h2 text-center mb-4 " style="color: gray;">[ Login]</h2>
            <h3 class="h3 text-center mb-4">Permintaan ATK PTUN Makassar</h3>
         
            <hr>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <div class="mb-3">
                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Username'])->label('') ?>
            </div>
            <div class="mb-2">
                <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password'])->label('') ?>
            </div>
            <div class="mb-2">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <div class="form-group">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="<?= Url::to(['site/signup']) ?>" class="text-primary">Create</a>
    </div>
</div>