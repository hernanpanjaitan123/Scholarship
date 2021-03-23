<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\schl\models\BerkasBeasiswa */

$this->title = 'Create Berkas Beasiswa';
$this->params['breadcrumbs'][] = ['label' => 'Berkas Beasiswas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="berkas-beasiswa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
