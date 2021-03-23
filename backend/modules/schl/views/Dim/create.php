<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\schl\models\Dim */

$this->title = 'Create Dim';
$this->params['breadcrumbs'][] = ['label' => 'Dims', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dim-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
