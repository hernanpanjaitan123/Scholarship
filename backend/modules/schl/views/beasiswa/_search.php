<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\schl\models\search\BeasiswaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="beasiswa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'beasiswa_id') ?>

    <?= $form->field($model, 'donatur_id') ?>

    <?= $form->field($model, 'nama_beasiswa') ?>

    

    <?= $form->field($model, 'jumlah_pendaftar') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'deskripsi_beasiswa') ?>

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
