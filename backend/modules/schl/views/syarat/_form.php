<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\schl\models\Syarat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="syarat-form">

    <?php $form = ActiveForm::begin(); ?>

  <!--   <?= $form->field($model, 'syarat_id')->textInput() ?> -->

    <?= $form->field($model, 'nama_syarat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ipk')->textInput() ?>

    <?= $form->field($model, 'deskripsi_syarat')->textarea(['rows' => 6]) ?>

    <!-- <?= $form->field($model, 'deleted')->textInput() ?>

    <?= $form->field($model, 'deleted_at')->textInput() ?>

    <?= $form->field($model, 'deleted_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput(['maxlength' => true]) ?>
 -->
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
