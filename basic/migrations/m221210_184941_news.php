<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m221210_184941_news
 */
class m221210_184941_news extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('notification', [
            'id' => Schema::TYPE_PK,
            'title_de' => Schema::TYPE_STRING,
            'content_de' => Schema::TYPE_TEXT,
            'title_tr' => Schema::TYPE_STRING,
            'content_tr' => Schema::TYPE_TEXT,
            'title_ar' => Schema::TYPE_STRING,
            'content_ar' => Schema::TYPE_TEXT,
            'active' => Schema::TYPE_BOOLEAN,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221210_184941_news cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221210_184941_news cannot be reverted.\n";

        return false;
    }
    */
}
