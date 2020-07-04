<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "room_guide".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $date_upd
 */
class RoomGuide extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'room_guide';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['date_upd'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 5000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер',
            'name' => 'Название',
            'description' => 'Описание',
            'date_upd' => 'Date Upd',
        ];
    }
}
