<?php
use yii\grid\ActionColumn;
use yii\grid\SerialColumn;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\RoomGuideSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Справочник номеров гостиницы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-guide-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить новый номер', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],
            'id',
            'name',
            'description',
            [
                'class' => ActionColumn::class,
                'template' => '{view} {update} {delete}',

            ],
        ],
    ]) ?>

</div>
