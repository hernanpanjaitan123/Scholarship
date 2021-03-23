<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\schl\models\DimPendaftar */

$this->title = $model->dim_pendaftar_id;
$this->params['breadcrumbs'][] = ['label' => 'Dim Pendaftars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dim-pendaftar-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->dim_pendaftar_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->dim_pendaftar_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'dim_pendaftar_id',
            'status_request_id',
            'dim_id',
            'beasiswa_id',
            'deleted',
            'deleted_at',
            'deleted_by',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
