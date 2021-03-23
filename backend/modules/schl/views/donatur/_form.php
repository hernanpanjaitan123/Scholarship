<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\schl\models\Donatur */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="donatur-form">

    <?php $form = ActiveForm::begin(); ?>

<div class="row">
    <div class="col-md-6">


    <?= $form->field($model, 'nama_donatur')->textInput(['maxlength' => true]) ?>

    

    <?= $form->field($model, 'kd_pos_donatur')->textInput() ?>

    <?= $form->field($model, 'no_telp_donatur')->textInput() ?>

    <?= $form->field($model, 'alamat_email_donatur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_situs_donatur')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-8">
    <?= $form->field($model, 'alamat_donatur')->textarea(['rows' => 6]) ?>

    <!-- <?= $form->field($model, 'deleted')->textInput() ?>

    <?= $form->field($model, 'deleted_at')->textInput() ?>

    <?= $form->field($model, 'deleted_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_at')->textInput() ?> -->
</div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
