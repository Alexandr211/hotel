<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\RoomListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список забронированных номеров';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-list-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'room_id',
            'client_name',
            'client_phone',
            'date_from',
            'date_to',
            'booked_days',
            'cr_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]) ?>
</div>
