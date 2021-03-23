<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\schl\models\Syarat */

$this->title = 'Update Syarat: ' . $model->syarat_id;
$this->params['breadcrumbs'][] = ['label' => 'Syarats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->syarat_id, 'url' => ['view', 'id' => $model->syarat_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="syarat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
