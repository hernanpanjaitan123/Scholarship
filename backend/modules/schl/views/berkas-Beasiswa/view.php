<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\helpers\LinkHelper;

/* @var $this yii\web\View */
/* @var $model backend\modules\schl\models\BerkasBeasiswa */

$this->title = $model->beasiswa->nama_beasiswa;
$this->params['breadcrumbs'][] = ['label' => 'Berkas Beasiswas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="berkas-beasiswa-view">

    <h1><?= Html::encode($this->title) ?></h1>

  <!--   <p>
        <?= Html::a('Update', ['update', 'id' => $model->berkas_beasiswa_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->berkas_beasiswa_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p> -->
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'berkas_beasiswa_id',
            // 'beasiswa_id',
            'files',

            // 'deleted',
            // 'deleted_at',
            // 'deleted_by',
            // 'created_at',
            // 'created_by',
            // 'updated_by',
            // 'updated_at',
        ],
    ]) ?>
        <div class="form-group">
                                    <label class="control-label col-md-4">Lampiran</label>
                                    <form>
                                        <?= Html::a('Download Lampiran', ['download', 'id' => $model->berkas_beasiswa_id], ['class' => 'btn btn-succes']) ?>
                                    </form>
                                </div>

</div>
