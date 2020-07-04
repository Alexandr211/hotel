<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RoomList */

$this->title = 'Create Room List';
$this->params['breadcrumbs'][] = ['label' => 'Room Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
