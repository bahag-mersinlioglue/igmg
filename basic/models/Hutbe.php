<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hutbe".
 *
 * @property int $id
 * @property string $tarih
 * @property int $hafta
 *
 * @property HutbePage[] $hutbePages
 */
class Hutbe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hutbe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tarih', 'hafta'], 'required'],
            [['tarih'], 'safe'],
            [['hafta'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tarih' => 'Tarih',
            'hafta' => 'Hafta',
        ];
    }

    /**
     * Gets query for [[HutbePages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHutbePages()
    {
        return $this->hasMany(HutbePage::class, ['hutbe_id' => 'id']);
    }
}
