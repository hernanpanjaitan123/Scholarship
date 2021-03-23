<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\schl\models\Beasiswa */

$this->title = 'Tambah Beasiswa';
$this->params['breadcrumbs'][] = ['label' => 'Beasiswa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="beasiswa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dafdonatur' => $dafdonatur,

    ]) ?>

</div>
