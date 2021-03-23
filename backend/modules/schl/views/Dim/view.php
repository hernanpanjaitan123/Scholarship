<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\helpers\LinkHelper;
use yii\helpers\ArrayHelper;
use common\components\ToolsColumn;
use backend\modules\schl\models\Donatur;
use backend\modules\schl\models\Beasiswa;
use backend\modules\schl\models\Prodi;
use backend\modules\schl\models\Dim;
use backend\modules\schl\models\BerkasBeasiswa;
use backend\modules\schl\models\Pendaftaran;
use backend\modules\schl\models\search\BeasiswaSearch;

/* @var $this yii\web\View */
/* @var $model backend\modules\schl\models\Dim */

$this->title = "Data Mahasiswa";
$this->params['breadcrumbs'][] = ['label' => 'Dims', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$uiHelper=\Yii::$app->uiHelper;
?>
<div class="dim-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <?= Html::a('Update', ['update', 'id' => $model->dim_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->dim_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
 -->
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'dim_id',
            'nim',
            // 'no_usm',
            // 'jalur',
            // 'user_name',
            // 'kbk_id',
            // 'ref_kbk_id',
            // 'kpt_prodi',
            // 'id_kur',
            // 'tahun_kurikulum_id',
            'nama',
            // 'tgl_lahir',
            // 'tempat_lahir',
            // 'gol_darah',
            // 'golongan_darah_id',
            // 'jenis_kelamin',
            // 'jenis_kelamin_id',
            // 'agama',
            // 'agama_id',
            // 'alamat:ntext',
            // 'kabupaten',
            // 'kode_pos',
            // 'email:email',
            // 'telepon',
            // 'hp',
            // 'hp2',
            // 'no_ijazah_sma',
            // 'nama_sma',
            // 'asal_sekolah_id',
            // 'alamat_sma:ntext',
            // 'kabupaten_sma',
            // 'telepon_sma',
            // 'kodepos_sma',
            // 'thn_masuk',
            // 'status_akhir',
            // 'nama_ayah',
            // 'nama_ibu',
            // 'no_hp_ayah',
            // 'no_hp_ibu',
            // 'alamat_orangtua:ntext',
            // 'pekerjaan_ayah',
            // 'pekerjaan_ayah_id',
            // 'keterangan_pekerjaan_ayah:ntext',
             'penghasilan_ayah',
            // 'penghasilan_ayah_id',
            // 'pekerjaan_ibu',
            // 'pekerjaan_ibu_id',
            // 'keterangan_pekerjaan_ibu:ntext',
            'penghasilan_ibu',
            // 'penghasilan_ibu_id',
            // 'nama_wali',
            // 'pekerjaan_wali',
            // 'pekerjaan_wali_id',
            // 'keterangan_pekerjaan_wali:ntext',
            // 'penghasilan_wali',
            // 'penghasilan_wali_id',
            // 'alamat_wali:ntext',
            // 'telepon_wali',
            // 'no_hp_wali',
            // 'pendapatan',
            'ipk',
            // 'anak_ke',
            // 'dari_jlh_anak',
            // 'jumlah_tanggungan',
            // 'nilai_usm',
            // 'score_iq',
            // 'rekomendasi_psikotest',
            // 'foto',
            // 'kode_foto',
            // 'user_id',
            // 'deleted',
            // 'deleted_at',
            // 'deleted_by',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',
        ],
    ]) ?>


<?= $uiHelper->renderLine(); ?>

    <?= DetailView::widget([
        'model' => $model,

     

        'attributes' => [


        


            // 'beasiswa.nama_beasiswa',

            // [
            //     'attribute'=>'dim_prodi',
            //     'label' => 'Prodi',
            //     'filter'=>ArrayHelper::map(Prodi::find()->where('inst_prodi.deleted!=1')->andWhere("inst_prodi.kbk_ind NOT LIKE 'Semua Prodi'")->andWhere(['inst_prodi.is_hidden' => 0])->joinWith(['jenjangId' => function($query){
            //         return $query->orderBy(['inst_r_jenjang.nama' => SORT_ASC]);
            //     }])->all(), 'ref_kbk_id', function($data){
            //         if (is_null($data->jenjang_id)) {
            //             return '';
            //         } else{
            //             return $data->kbk_ind;
            //         }

            //     }, 'jenjangId.nama'),
            //     'filterInputOptions' => ['class' => 'form-control', 'id' => null, 'prompt' => 'ALL'],
            //     'value'=> function($model){
            //         return $model->dim->kbkId==null?null:$model->dim->kbkId->jenjangId->nama." ".$model->dim->kbkId->kbk_ind;
            //     },
            // ],

          
     




            // [
            //     'attribute'=>'dim_prodi',
            //     'label' => 'Prodi',
            //     'filter'=>ArrayHelper::map(Prodi::find()->where('inst_prodi.deleted!=1')->andWhere("inst_prodi.kbk_ind NOT LIKE 'Semua Prodi'")->andWhere(['inst_prodi.is_hidden' => 0])->joinWith(['jenjangId' => function($query){
            //         return $query->orderBy(['inst_r_jenjang.nama' => SORT_ASC]);
            //     }])->all(), 'ref_kbk_id', function($data){
            //         if (is_null($data->jenjang_id)) {
            //             return '';
            //         } else{
            //             return $data->kbk_ind;
            //         }

            //     }, 'jenjangId.nama'),
            //     'filterInputOptions' => ['class' => 'form-control', 'id' => null, 'prompt' => 'ALL'],
            //     'value'=> function($model){
            //         return $model->dim->kbkId==null?null:$model->dim->kbkId->jenjangId->nama." ".$model->dim->kbkId->kbk_ind;
            //     },
            // ],
            // [
            //     'attribute' => 'dim_angkatan',
            //     'label' => 'Angkatan',
            //     'headerOptions' => ['style' => 'width:20px'],
            //     'format' => 'raw',
            //     'value' => 'dim.thn_masuk',
            // ],
            // [
            //     'attribute' => 'dim_dosen',
            //     'label' => 'Dosen Wali',
            //     'format' => 'raw',
            //     'value' => 'dim.registrasis.dosenWali.nama',
            // ],
            

            
        ],

    ]); ?>
</div>



</div>


