<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\helpers\LinkHelper;
use yii\helpers\ArrayHelper;
use common\components\ToolsColumn;
use backend\modules\schl\models\Beasiswa;


/* @var $this yii\web\View */
/* @var $searchModel backend\modules\schl\models\search\BeasiswaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Beasiswa';
$this->params['breadcrumbs'][] = $this->title;
$uiHelper=\Yii::$app->uiHelper;
?>
<div class="beasiswa-index">






       <div class="pull-right">
       
        <div class="btn-group">
            <button>
             <a href="<?= Url::to(['beasiswa/create']) ?>"><i class="fa fa-plus"></i>Tambah Beasiswa</a>
            </button>
           
        </div>
    </div>

        <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= $uiHelper->renderLine(); ?>

    <?=$uiHelper->beginContentRow() ?>

  <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'beasiswa_id',
            // [
            //     'attribute' => 'nama_donatur',
            //     'format'=>'raw',
            //     'value' => function($data){
            //         return "<a href ='".Url::toRoute(['/schl/donatur/view','id' => $data->donatur->donatur_id])."'>".$data->donatur->nama_donatur."</a>";
            //     },
            // ],
            

            [
                'attribute' => 'nama_beasiswa',
                'format'=>'raw',
                'value' => function($model){
                    return "<a href ='".Url::toRoute(['/schl/beasiswa/view','id' => $model->beasiswa_id])."'>".$model->nama_beasiswa."</a>";
                },
            ],

        
            // 'nama_beasiswa',
             
             'jumlah_pendaftar',
            // 'status',
            // 'deskripsi_beasiswa:ntext',
            // 'deleted',
            // 'deleted_at',
            // 'deleted_by',
            // 'created_at',
            // 'created_by',
            // 'updated_by',
            // 'updated_at',

               // ['class' => 'common\components\ToolsColumn',
               //          'template' => '{view} {update}',
               //          'header' => 'Aksi',
               //          'buttons' => [
               //              'view' => function ($url, $model){
               //                  return ToolsColumn::renderCustomButton($url, $model, 'View Detail', 'fa fa-eye');
               //              },
                            
               //              'update' => function ($url, $model){
                                
               //                      return ToolsColumn::renderCustomButton($url, $model, 'Edit', 'fa fa-pencil');
                                
               //              },
                          

                            
                            
               //          ],
                        
               //      ],

                    ['class' => 'yii\grid\ActionColumn',
                'template' => '{del}',
                // 'contentOptions' => ['style' => 'width: 8.7%'],
                'buttons'=>[
                    'del'=>function ($url, $model) {
                                    return Html::a('<i class="fa fa-sign-out"></i> Hapus', ['beasiswa/delete', 'id' => $model->beasiswa_id], [
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
