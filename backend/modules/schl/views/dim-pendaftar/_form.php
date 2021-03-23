<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\widgets\Typeahead;
use backend\modules\schl\models\Beasiswa;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\schl\models\DimPendaftar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dim-pendaftar-form">

    <?php $form = ActiveForm::begin(); ?>


   

   <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'beasiswa_id')->dropDownList(ArrayHelper::map(Beasiswa::find()->all(), 'beasiswa_id', 'nama_beasiswa'), ['prompt'=>'--Pilih Beasiswa--', 'required' => true])?>
        </div>

   

    </div>

    <div class="row">
        <div class="col-md-6">
            <label>Mahasiswa/i</label>
            <?= $form->field($model, 'dim_id')->widget(Typeahead::classname(),[
                'attribute' => 'dim_id',
                'withSubmitButton' => false,

               'template' => "<p style='padding:4px'>{{data}}</p>",
               'htmlOptions' => ['class' => 'typeahead', 'placeholder' => 'NIM atau Nama','required'=>true],
               'options' => [
                    'hint' => false,
                    'highlight' => true,
                    'minLength' => 1
               ],
               'sourceApiBaseUrl' => Url::toRoute(['/askm/dim-kamar/list-mahasiswa']),


            ])->label(false) ?>
        </div>
    </div>






    <!-- <?= $form->field($model, 'status_request_id')->textInput() ?>

    <?= $form->field($model, 'dim_id')->textInput() ?>

    <?= $form->field($model, 'beasiswa_id')->textInput() ?>

    <?= $form->field($model, 'deleted')->textInput() ?>

    <?= $form->field($model, 'deleted_at')->textInput() ?>

    <?= $form->field($model, 'deleted_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput(['maxlength' => true]) ?> -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
