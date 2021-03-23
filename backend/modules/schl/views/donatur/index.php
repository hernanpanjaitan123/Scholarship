<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\helpers\LinkHelper;
use yii\helpers\ArrayHelper;
use common\components\ToolsColumn;
use backend\modules\schl\models\Donatur;


/* @var $this yii\web\View */
/* @var $searchModel backend\modules\schl\models\search\DonaturSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Donatur';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donatur-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Donatur', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'donatur_id',
            // 'beasiswa_id',
            // 'beasiswa.nama_beasiswa',
            'nama_donatur',
            'alamat_donatur:ntext',
            'kd_pos_donatur',
            // 'no_telp_donatur',
            // 'alamat_email_donatur:email',
            // 'alamat_situs_donatur',
            // 'deleted',
            // 'deleted_at',
            // 'deleted_by',
            // 'created_at',
            // 'created_by',
            // 'updated_by',
            // 'updated_at',

            ['class' => 'common\components\ToolsColumn',
                        'template' => '{view} {update}',
                        'header' => 'Aksi',
                        'buttons' => [
                            'view' => function ($url, $model){
                                return ToolsColumn::renderCustomButton($url, $model, 'View Detail', 'fa fa-eye');
                            },
                            
                            'update' => function ($url, $model){
                                
                                    return ToolsColumn::renderCustomButton($url, $model, 'Edit', 'fa fa-pencil');
                                
                            },

                            
                        ],
                        
                    ],

                    ['class' => 'yii\grid\ActionColumn',
                'template' => '{del}',
                // 'contentOptions' => ['style' => 'width: 8.7%'],
                'buttons'=>[
                    'del'=>function ($url, $model) {
                                    return Html::a('<i class="fa fa-sign-out"></i> Hapus', ['donatur/delete', 'id' => $model->donatur_id], [
                            'class' => 'fa fa trash',
                            'data' => [
                                'confirm' => 'Apakah anda yakin ingin menghapus Beasiswa?',
                                'method' => 'post',
                            ],
                        ]);
                    },
                  
                ],
            ],
    
        ],
    ]); ?>
</div>
