<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;

use common\helpers\LinkHelper;

/* @var $this yii\web\View */
/* @var $model backend\modules\schl\models\Donatur */


$this->params['breadcrumbs'][] = ['label' => 'Donaturs', 'url' => ['index']];


$uiHelper=\Yii::$app->uiHelper;
?>

<div id="app-container">
    <?= $uiHelper->renderContentSubHeader("Data Donatur")?>
    <?= $uiHelper->renderLine(); ?>

    <p>
            <div class="pull-right">
                Pengaturan
                <?=$uiHelper->renderButtonSet([
                    'template' => ['update'  ],
                    
                    'buttons' => [
                        'update' => ['url' => Url::to(['update', 'id'=>$model->donatur_id]), 'label' => 'Update', 'icon' => 'fa fa-pencil'],
                       
                    ]
                ]) ?>
            </div>
        </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'donatur_id',
            'nama_donatur',
            // 'beasiswa_id',
            // 'beasiswa.nama_beasiswa',
            
            'alamat_donatur:ntext',
            'kd_pos_donatur',
            // 'no_telp_donatur',
            'alamat_email_donatur:email',
            'alamat_situs_donatur',
            // 'deleted',
            // 'deleted_at',
            // 'deleted_by',
            // 'created_at',
            // 'created_by',
            // 'updated_by',
            // 'updated_at',
        ],
    ]) ?>

</div>
