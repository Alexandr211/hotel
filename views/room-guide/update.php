<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RoomGuide */

$this->title = 'Update Room Guide: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Room Guides', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="room-guide-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
