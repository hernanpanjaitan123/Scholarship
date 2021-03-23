<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\schl\models\Donatur */

$this->title = 'Create Donatur';
$this->params['breadcrumbs'][] = ['label' => 'Donaturs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donatur-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        // 'dafbeasiswa' => $dafbeasiswa,
    ]) ?>

</div>
