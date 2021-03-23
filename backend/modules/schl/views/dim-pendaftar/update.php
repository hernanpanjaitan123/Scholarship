<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\schl\models\DimPendaftar */

$this->title = 'Update Dim Pendaftar: ' . $model->dim_pendaftar_id;
$this->params['breadcrumbs'][] = ['label' => 'Dim Pendaftars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dim_pendaftar_id, 'url' => ['view', 'id' => $model->dim_pendaftar_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dim-pendaftar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
