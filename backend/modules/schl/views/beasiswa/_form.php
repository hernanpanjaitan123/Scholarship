<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\schl\models\Beasiswa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="beasiswa-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">

    <?= $form->field($model, 'donatur_id')->dropDownList($dafdonatur,['prompt'=>'-- Pilih Donatur--']) ?>

  

    <!-- <?= $form->field($model, 'donatur_id')->textInput() ?> -->

    <?= $form->field($model, 'nama_beasiswa')->textInput() ?>

    

    <?= $form->field($model, 'jumlah_pendaftar')->textInput(['maxlength' => true]) ?>

   <!--  <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?> -->

      <?= $form->field($model, 'syarat_ipk')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'syarat_penghasilan_ortu')->textInput(['maxlength' => true]) ?>
  </div>
    <div class="col-md-8">



    <?= $form->field($model, 'deskripsi_beasiswa')->textarea(['rows' => 6]) ?>

<!--     <?= $form->field($model, 'deleted')->textInput() ?>

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
