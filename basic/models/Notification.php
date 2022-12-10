<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notification".
 *
 * @property int $id
 * @property string|null $title_de
 * @property string|null $content_de
 * @property string|null $title_tr
 * @property string|null $content_tr
 * @property string|null $title_ar
 * @property string|null $content_ar
 * @property int|null $active
 */
class Notification extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notification';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content_de', 'content_tr', 'content_ar'], 'string'],
            [['active'], 'integer'],
            [['title_de', 'title_tr', 'title_ar'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_de' => 'Title De',
            'content_de' => 'Content De',
            'title_tr' => 'Title Tr',
            'content_tr' => 'Content Tr',
            'title_ar' => 'Title Ar',
            'content_ar' => 'Content Ar',
            'active' => 'Active',
        ];
    }
}
