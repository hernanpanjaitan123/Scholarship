<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\schl\models\DimPendaftar */

$this->title = 'Create Dim Pendaftar';
$this->params['breadcrumbs'][] = ['label' => 'Dim Pendaftars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dim-pendaftar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
