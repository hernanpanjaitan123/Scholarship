<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\widgets\Typeahead;
use backend\modules\schl\models\Beasiswa;
use yii\widgets\DetailView;
use backend\modules\schl\models\Dim;

/* @var $this yii\web\View */
/* @var $model backend\modules\schl\models\DimPendaftar */
/* @var $form yii\widgets\ActiveForm */


$dim = Dim::find()->where('deleted != 1')->andWhere(['user_id' => Yii::$app->user->identity->user_id])->one();
?>

<div class="dim-pendaftar-form">

    <?php $form = ActiveForm::begin(); ?>


   Apakah anda ingin mendaftarkan beasiswa?

    <div class="row">
    <div class="col-md-6">
      <?= $form->field($model, 'beasiswa_id')->hiddenInput(['value' => $_GET['id_beasiswa']])->label(false) ?>
    </div>
  </div>

    






    <!-- <?= $form->field($model, 'status_request_id')->textInput() ?>

    

    <?= $form->field($model, 'beasiswa_id')->textInput() ?>

    <?= $form->field($model, 'deleted')->textInput() ?>

    <?= $form->field($model, 'deleted_at')->textInput() ?>

    <?= $form->field($model, 'deleted_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput(['maxlength' => true]) ?> -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Daftarkan Beasiswa' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
