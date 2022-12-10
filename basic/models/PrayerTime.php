<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prayer_times".
 *
 * @property int $id
 * @property string|null $cityName
 * @property string|null $date
 * @property string|null $fajr
 * @property string|null $sunrise
 * @property string|null $dhuhr
 * @property string|null $asr
 * @property string|null $maghrib
 * @property string|null $ishaa
 */
class PrayerTime extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prayer_times';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'fajr', 'sunrise', 'dhuhr', 'asr', 'maghrib', 'ishaa'], 'safe'],
            [['cityName'], 'string', 'max' => 255],
            [['cityName', 'date'], 'unique', 'targetAttribute' => ['cityName', 'date']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cityName' => 'City Name',
            'date' => 'Date',
            'fajr' => 'Fajr',
            'sunrise' => 'Sunrise',
            'dhuhr' => 'Dhuhr',
            'asr' => 'Asr',
            'maghrib' => 'Maghrib',
            'ishaa' => 'Ishaa',
        ];
    }
}
