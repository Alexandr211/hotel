<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RoomGuide */

$this->title = 'Create Room Guide';
$this->params['breadcrumbs'][] = ['label' => 'Room Guides', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-guide-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
