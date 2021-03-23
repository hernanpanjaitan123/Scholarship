<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\schl\models\BerkasBeasiswa */

$this->title = 'Update Berkas Beasiswa';
$this->params['breadcrumbs'][] = ['label' => 'Berkas Beasiswas', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="berkas-beasiswa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('formupdate', [
        'model' => $model,
    ]) ?>

</div>
