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
        Pengaturan
        <div class="btn-group">
            <button type="button" class="btn btn-default btn-flat btn-set btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><span style="font-size: 18px;" class="fa fa-gear"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                <li>
                    <a href="<?= Url::to(['beasiswa/create']) ?>"><i class="fa fa-plus"></i>Tambah Beasiswa</a>
                </li>
                <!-- <li>
                    <a href="<?= Url::to(['beasiswa/import-excel']) ?>"><i class="fa fa-upload"></i>Import Mahasiswa</a>
                </li>
                <li>
                    <a href="<?= Url::to(['beasiswa/template-excel']) ?>"><i class="fa fa-file"></i>Download Template</a>
                </li> -->
            </ul>
        </div>
    </div>

        <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= $uiHelper->renderLine(); ?>

    <?=$uiHelper->beginContentRow() ?>

  <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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

        
            'donatur.nama_donatur',
            // 'nama_beasiswa',
              'nilai_beasiswa',
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

             ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
