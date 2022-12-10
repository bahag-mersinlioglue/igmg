<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hutbe_page".
 *
 * @property int $id
 * @property string|null $de
 * @property string|null $tr
 * @property string|null $ar
 * @property int|null $hutbe_id
 * @property int|null $page_number
 * @property bool|null $active
 *
 * @property Hutbe $hutbe
 */
class HutbePage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hutbe_page';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['de', 'tr', 'ar'], 'string'],
            [['hutbe_id', 'page_number', 'active'], 'integer'],
            [['hutbe_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hutbe::class, 'targetAttribute' => ['hutbe_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'de' => 'DE',
            'tr' => 'TR',
            'ar' => 'AR',
            'hutbe_id' => 'Hutbe ID',
            'page_number' => 'Seiten-Nr.',
            'active' => 'Aktiv',
        ];
    }

    /**
     * Gets query for [[Hutbe]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHutbe()
    {
        return $this->hasOne(Hutbe::class, ['id' => 'hutbe_id']);
    }

    public function getPreviousPageId() {
        $previousId = null;
        if (isset($this->hutbe->hutbePages[$this->page_number - 1])) {
            $previousId = $this->hutbe->hutbePages[$this->page_number - 1]->id;
        }
        return $previousId;
    }

    public function getNextPageId() {
        $nextId = null;
        if (isset($this->hutbe->hutbePages[$this->page_number + 1])) {
            $nextId = $this->hutbe->hutbePages[$this->page_number + 1]->id;
        }
        return $nextId;
    }
}
