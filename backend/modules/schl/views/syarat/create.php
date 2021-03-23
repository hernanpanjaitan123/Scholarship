<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\schl\models\Syarat */

$this->title = 'Create Syarat';
$this->params['breadcrumbs'][] = ['label' => 'Syarats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="syarat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
