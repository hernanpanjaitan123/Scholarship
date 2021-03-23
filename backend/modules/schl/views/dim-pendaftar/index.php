<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\schl\models\search\DimPendaftarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dim Pendaftars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dim-pendaftar-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Daftar Beasiswa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
