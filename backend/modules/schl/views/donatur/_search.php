<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\schl\models\search\DonaturSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="donatur-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'donatur_id') ?>

    <?= $form->field($model, 'beasiswa_id') ?>

    <?= $form->field($model, 'nama_donatur') ?>

    <?= $form->field($model, 'alamat_donatur') ?>

    <?= $form->field($model, 'kd_pos_donatur') ?>

    <?php // echo $form->field($model, 'no_telp_donatur') ?>

    <?php // echo $form->field($model, 'alamat_email_donatur') ?>

    <?php // echo $form->field($model, 'alamat_situs_donatur') ?>

    <?php // echo $form->field($model, 'deleted') ?>

    <?php // echo $form->field($model, 'deleted_at') ?>

    <?php // echo $form->field($model, 'deleted_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
