<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Система бронирования номеров';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <b>Привет! Функционал этого приложения следующий.</b><br><br>
    </p>
    <p>
        Фреймворк: yii2<br><br>
    </p>
    <p>
        В списке номеров для клиентов отображаются только свободные к бронированию номера.<br>
        Для администратора отображаются все номера.<br>
        При осуществлении бронирования номера клиентом происходит проверка
        не забронирован ли этот номер другим клиентом.<br><br>
        <b>Панель администратора</b> <br><br>
        Логин/Пароль - admin/admin<br><br>
        Страница «Справочник номеров гостиницы» <br>
        Поля таблицы:<br>
        •	Название<br>
        •	Краткое описание<br><br>
        Страница «Список забронированных номеров»<br>
        Поля:<br>
        •	Номер<br>
        •	Имя клиента<br>
        •	Телефон<br>
        •	День на который бронируется<br>
        •	Время бронирования (создания записи)<br><br>


        <b>Клиентская часть (авторизация не нужна)</b><br><br>
        Страница  «Список номеров»<br>
        Возможности страницы: отображение названия, краткого описания,  бронирование номера<br>
        Поля для бронирования<br>
        •	Имя<br>
        •	Телефон<br>
        •	День или дни бронирования<br><br>

        <b>По любым вопросам можно писать по адресу
            <a href="mailto:allinvestments@yandex.ru">allinvestments@yandex.ru</a></b><br><br>
        С уважением,<br>Александр
    </p>

</div>