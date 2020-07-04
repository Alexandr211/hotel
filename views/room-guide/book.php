<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model_list app\models\RoomList */
/* @var $form yii\widgets\ActiveForm */
/* @var $id_row app\models\RoomGuide */

$this->title = 'Бронировать номер';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="room-guide-form">
    <h1><?= Html::encode($this->title . ' ' . $id_row) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model_list, 'client_name')->textInput([
            'maxlength' => true,
            'style' => 'width: 254px;'
        ]) ?>

    <?= $form->field($model_list, 'client_phone')->widget(MaskedInput::class, [
        'mask' => '+9 (999) 999 99 99',
        'options' => ['style' => 'width: 254px;']
        ])?>

    <?= $form->field($model_list, 'date_from')->widget(\yii\jui\DatePicker::class, [
        'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
    ])->label('Дата заезда', ['style' => 'width: 100px;']) ?>

    <?= $form->field($model_list, 'date_to')->widget(\yii\jui\DatePicker::class, [
        'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
        'inline' => false
    ])->label('Дата выезда', ['style' => 'width: 100px;']) ?>

    <div class="form-group">
        <?= Html::submitButton('Бронировать', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
