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
use backend\modules\schl\models\User;
use backend\modules\schl\models\BerkasBeasiswa;
use backend\modules\schl\models\Pendaftaran;
use backend\modules\schl\models\search\BeasiswaSearch;


/* @var $this yii\web\View */
/* @var $model backend\modules\schl\models\Beasiswa */

$this->title = 'Data Beasiswa';
$this->params['breadcrumbs'][] = ['label' => 'Beasiswa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$status_url = urldecode('DimPendaftarSearch%5Bstatus_request_id%5D');




$uiHelper=\Yii::$app->uiHelper;
?>



        

<div class="beasiswa-view">

    <div class="pull-right">
        Pengaturan
        <?php
        echo $uiHelper->renderButtonSet([
            'template' => ['edit', 'pendaftar' /*'kamar'*/ /* ,'import' */, 'export' ,'upload','kelola'],
            'buttons' => [
                'edit' => ['url' => Url::toRoute(['update', 'id' => $model->beasiswa_id]), 'label'=> 'Edit Beasiswa', 'icon'=>'fa fa-pencil'],
                
                'pendaftar' => ['url' => Url::toRoute(['dim-pendaftar/create', 'id_beasiswa' => $model->beasiswa_id]), 'label'=> 'Tambah Pendaftar', 'icon'=>'fa fa-users'],
                
                'export' => ['url' => Url::toRoute(['export-excel', 'beasiswa_id' => $model->beasiswa_id]), 'label'=> 'Export Data Pendaftar', 'icon'=>'fa fa-download'],
                
                'upload' => ['url' => Url::toRoute(['berkas-beasiswa/create', 'id' => $model->beasiswa_id]), 'label'=> 'Upload Berkas Beasiswa', 'icon'=>'fa fa-upload'],

                'kelola' => ['url' => Url::toRoute(['berkas-beasiswa/index']), 'label'=> 'Kelola Berkas', 'icon'=>'fa fa-file'],

                  
            ],

        ]);
        ?>

      
    </div>

    <h1><?= $this->title ?></h1>
    <hr/>

    <div class="row">
        <div class="col-md-6">
            <?= DetailView::widget([
                
           'model' => $model,


                'attributes' => [
                    'nama_beasiswa',

                    

                    // 'jumlah_mahasiswa',
                 
                    'jumlah_pendaftar',

                    'syarat_ipk',

                    'syarat_penghasilan_ortu',

                    [
                        'attribute' => 'jumlah_mahasiswa',
                        'label' => 'Pendaftar',
                    ],

                    [
                'attribute' => 'berkasBeasiswa.files',
                'label'=>'Berkas Beasiswa',
                
               
            ],



                ],
            ]) ?>

        

        </div>
        <div class="col-md-6">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'layout' => '{items} {pager}',
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'header' => 'Donatur',
                        'attribute' => 'donatur_id',
                        'value' => 'donatur.nama_donatur',
                    ],

                    // ['class' => 'yii\grid\ActionColumn',
                    //     'template' => '{del}',
                    //     'contentOptions' => ['style' => 'width: 8.7%'],
                    //     'buttons'=>[
                    //         'del'=>function ($url, $model) {
                    //             return Html::a('<i class="fa fa-trash"></i> Hapus', ['donatur/delete', 'id' => $model->donatur_id, 'id_beasiswa' => $_GET['id']], [
                    //                 'class' => 'btn btn-danger',
                    //                 'data' => [
                    //                     'confirm' => 'Apakah anda ingin menghapus Donatur?',
                    //                     'method' => 'post',
                    //                 ],
                    //             ]);
                    //         },
                    //     ],
                    // ],
                ],
            ]); ?>
        </div>
    </div>

    <?= $uiHelper->renderLine(); ?>



    





    <?= GridView::widget([
        'dataProvider' => $dataProvider2,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],



            [
                'attribute' => 'dim_nama',
                'label'=>'Nama Mahasiswa',
                'format' => 'raw',
                'value'=>function ($model) {
                     return "<a href='".Url::toRoute(['dim/view', 'id' => $model->dim_id])."'>".$model->dim->nama."</a>";
                },
            ],


            'dim.nim',

            [
                'attribute' => 'status_request_id',
                'label'=>'Status',
                'format' => 'raw',
                'value'=>function ($model) {
                     return $model->statusRequest->status_request."</a>";
                },
            ],

              ['class' => 'common\components\ToolsColumn',
                'template' => '{approve} {reject} ',
                'header' => 'Aksi',
                'buttons' => [
                   
                    'reject' => function ($url, $model){
                        if ($model->status_request_id == 1){
                            return ToolsColumn::renderCustomButton($url, $model, 'Reject', 'fa fa-times');
                            

                        }else{
                         return "";
                        }
                    },
                    'approve' => function ($url, $model){
                        if ($model->status_request_id == 1){
                            return ToolsColumn::renderCustomButton($url, $model, 'Approve', 'fa fa-check');
                        }else{
                            return "";
                        }
                    },
                    
                ],
                'urlCreator' => function ($action, $model, $key, $index){
                 
                    if ($action === 'approve') {
                        return Url::toRoute(['dim-pendaftar/approve', 'id' => $key]);
                    // }else if ($action === 'del') {
                    //     return Url::toRoute(['del', 'id' => $key]);
                    }else if ($action === 'reject') {
                        return Url::toRoute(['dim-pendaftar/reject', 'id' => $key]);
                    }
                }
            ],




  

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{del}',
                // 'contentOptions' => ['style' => 'width: 8.7%'],
                'buttons'=>[
                    'del'=>function ($url, $model) {
                        return Html::a('<i class="fa fa-sign-out"></i> Hapus', ['dim-pendaftar/delete', 'id' => $model->dim_pendaftar_id, 'id_beasiswa' => $_GET['id']], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Apakah anda yakin ingin menghapus pendaftar?',
                                'method' => 'post',
                            ],
                        ]);
                    },
                  
                ],
            ],
     




      
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
