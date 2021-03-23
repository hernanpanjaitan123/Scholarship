<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\schl\models\search\DimSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dims';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dim-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Dim', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'dim_id',
            'nim',
            'no_usm',
            'jalur',
            'user_name',
            // 'kbk_id',
            // 'ref_kbk_id',
            // 'kpt_prodi',
            // 'id_kur',
            // 'tahun_kurikulum_id',
            // 'nama',
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
            // 'penghasilan_ayah',
            // 'penghasilan_ayah_id',
            // 'pekerjaan_ibu',
            // 'pekerjaan_ibu_id',
            // 'keterangan_pekerjaan_ibu:ntext',
            // 'penghasilan_ibu',
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
            // 'ipk',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
