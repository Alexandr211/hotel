<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "room_list".
 *
 * @property int $id
 * @property int $room_id
 * @property string $client_name
 * @property string $client_phone
 * @property string $date_from
 * @property string $date_to
 * @property int $booked_days
 * @property string $cr_time
 */
class RoomList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'room_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['room_id', 'client_name', 'client_phone', 'date_from', 'date_to', 'booked_days'], 'required'],
            [['room_id', 'booked_days'], 'integer'],
            [['date_from', 'date_to', 'cr_time'], 'safe'],
            [['client_name', 'client_phone'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'room_id' => 'Номер',
            'client_name' => 'Имя клиента',
            'client_phone' => 'Телефон',
            'date_from' => 'Дата заезда',
            'date_to' => 'Дата выезда',
            'booked_days' => 'Количество суток',
            'cr_time' => 'Время создания записи',
        ];
    }
}
