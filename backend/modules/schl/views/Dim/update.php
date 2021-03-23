<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\schl\models\Dim */

$this->title = 'Update Dim: ' . $model->dim_id;
$this->params['breadcrumbs'][] = ['label' => 'Dims', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dim_id, 'url' => ['view', 'id' => $model->dim_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dim-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
