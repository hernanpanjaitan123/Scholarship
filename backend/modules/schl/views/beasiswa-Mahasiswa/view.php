<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\schl\models\Beasiswa */

// $this->title = $model->beasiswa_id;
$this->params['breadcrumbs'][] = ['label' => 'Beasiswa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="beasiswa-view">

    <h1><?= Html::encode($this->title) ?></h1>

 

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'beasiswa_id',
            // 'donatur_id',
            'nama_beasiswa',
         
            // 'jumlah_pendaftar',
            'syarat_ipk',
            'syarat_penghasilan_ortu',
            // 'status',
            'deskripsi_beasiswa:ntext',
            // 'deleted',
            // 'deleted_at',
            // 'deleted_by',
            // 'created_at',
            // 'created_by',
            // 'updated_by',
            // 'updated_at',
        ],
    ]) ?>
     <form>
                                        <?= Html::a('Download File Berkas', ['berkas-beasiswa/download', 'id' => $model->berkasBeasiswa->berkas_beasiswa_id], ['class' => 'btn btn-succes']) ?>
                                    </form>
<br>
<br>
<br>
       <p>
        <!-- <a href="../beasiswa" class="btn btn-success">Daftar Beasiswa</a> -->
         <?= Html::a('Daftar Beasiswa', ['dim-pendaftar/createbymahasiswa', 'id_beasiswa' => $model->beasiswa_id], ['class' => 'btn btn-success']) ?> 
        
    </p>

</div>
