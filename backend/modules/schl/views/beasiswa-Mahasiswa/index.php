<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\helpers\LinkHelper;
use yii\helpers\ArrayHelper;
use common\components\ToolsColumn;
use backend\modules\schl\models\Beasiswa;
use backend\modules\schl\models\Dim;


/* @var $this yii\web\View */
/* @var $searchModel backend\modules\schl\models\search\BeasiswaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$dim = Dim::find()->where('deleted != 1')->andWhere(['user_id' => Yii::$app->user->identity->user_id])->one();

$this->title = 'Beasiswa';
$this->params['breadcrumbs'][] = $this->title;
$uiHelper=\Yii::$app->uiHelper;
?>
<div class="beasiswa-index">

     

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
                    return "<a href ='".Url::toRoute(['/schl/beasiswa-mahasiswa/view','id' => $model->beasiswa_id])."'>".$model->nama_beasiswa."</a>";
                },
            ],

        
           
            // 'nama_beasiswa',
         
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
    ]); ?>

    <?=$uiHelper->beginContentBlock(['id' => 'grid-system2',
            'header' => 'Request Beasiswa Saya',
            'width' => 12,
        ]); ?>

    <?= GridView::widget([
                'dataProvider' => $dataProvider2,
                'options' => ['style' => 'font-size:12px;'],
                
                'rowOptions' => function($model){
                    if($model->status_request_id == 1){
                        return ['class' => 'info'];
                    } else if($model->status_request_id == 2){
                        return ['class' => 'success'];
                    } else if($model->status_request_id == 3){
                        return ['class' => 'danger'];
                    } else {
                        return ['class' => 'warning'];
                    }
                },
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    
                    [
                        'attribute' => 'beasiswa_id',
                        'label' => 'Beasiswa',
                        'value' => 'beasiswa.nama_beasiswa',
                    ],

                    [
                        'attribute' => 'status_request_id',
                        'label' => 'Status Request',
                        'value' => 'statusRequest.status_request',
                    ],
               
                    
                    
                    // ['class' => 'common\components\ToolsColumn',
                    //     'template' => '{view} {cancel}',
                    //     'header' => 'Aksi',
                    //     'buttons' => [
                    //         'view' => function ($url, $model){
                    //             return ToolsColumn::renderCustomButton($url, $model, 'View Detail', 'fa fa-eye');
                    //         },
                    //         'cancel' => function ($url, $model){
                    //             if ($model->status_request_id == 2 || $model->status_request_id == 3 || $model->status_request_id == 4) {
                    //                 return "";
                    //             }else{
                    //                 return ToolsColumn::renderCustomButton($url, $model, 'Cancel', 'fa fa-times');
                    //             }
                    //         },
                            
                    //     ],
                    //     'urlCreator' => function ($action, $model, $key, $index){
                    //         if ($action === 'view') {
                    //             return Url::toRoute(['izin-by-mahasiswa-view', 'id' => $key]);
                    //         }else if ($action === 'edit') {
                    //             return Url::toRoute(['izin-by-mahasiswa-edit', 'id' => $key]);
                    //         }else if ($action === 'cancel') {
                    //             return Url::toRoute(['cancel-by-mahasiswa', 'id' => $key]);
                    //         }
                    //         else if ($action === 'print') {
                    //             return Url::toRoute(['print-ib', 'id' => $key]);
                    //         }
                            
                    //     }
                    // ],
                 ],
            ]); ?>
</div>
