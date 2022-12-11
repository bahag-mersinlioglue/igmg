<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hadis".
 *
 * @property int $id
 * @property string|null $text_de
 * @property string|null $text_tr
 * @property string|null $text_ar
 */
class Hadis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hadis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text_de', 'text_tr', 'text_ar'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text_de' => 'Text De',
            'text_tr' => 'Text Tr',
            'text_ar' => 'Text Ar',
        ];
    }
}
