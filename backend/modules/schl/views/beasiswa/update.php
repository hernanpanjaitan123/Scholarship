<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\schl\models\Beasiswa */

$this->title = 'Update Beasiswa ' . $model->nama_beasiswa;
$this->params['breadcrumbs'][] = ['label' => 'Beasiswas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->beasiswa_id, 'url' => ['view', 'id' => $model->beasiswa_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="beasiswa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dafdonatur' => $dafdonatur,
       
    ]) ?>

</div>
