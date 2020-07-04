<?php

use yii\grid\ActionColumn;
use yii\grid\SerialColumn;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\RoomGuideSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список номеров';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-guide-index">

    <h1><?= Html::encode($this->title) ?></h1>

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
                'template' => '{book}',
                'buttons' => [
                    'book' => static function ($url) {
                        return Html::a(
                            'Бронировать',
                            $url,
                            [
                                'class'=>'btn btn-primary',
                                'title' => 'Book',
                                'data-pjax' => '0',
                            ]
                        );
                    },
                ],
            ],
        ],
    ]) ?>

    <?php if (Yii::$app->session->hasFlash('book_error')){ ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <!-- flash message -->
            <?= Yii::$app->session->getFlash('book_error'); ?>
        </div>
    <?php } ?>

    <?php if (Yii::$app->session->hasFlash('book_success')){ ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <!-- flash message -->
            <?= Yii::$app->session->getFlash('book_success'); ?>
        </div>
    <?php } ?>
</div>
