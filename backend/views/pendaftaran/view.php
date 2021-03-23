<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\schl\models\Pendaftaran */

$this->title = $model->pendaftaran_id;
$this->params['breadcrumbs'][] = ['label' => 'Pendaftarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pendaftaran-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pendaftaran_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pendaftaran_id], [
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
            'pendaftaran_id',
            'nim',
            'beasiswa_id',
            'jadwal_awal',
            'jadwal_akhir',
            'tanggal_pendaftaran',
            'deleted',
            'deleted_at',
            'deleted_by',
            'created_at',
            'created_by',
            'update_at',
            'updated_by',
        ],
    ]) ?>

</div>
