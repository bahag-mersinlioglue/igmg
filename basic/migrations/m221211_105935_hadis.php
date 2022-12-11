<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m221211_105935_hadis
 */
class m221211_105935_hadis extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('hadis', [
            'id' => Schema::TYPE_PK,
            'text_de' => Schema::TYPE_TEXT,
            'text_tr' => Schema::TYPE_TEXT,
            'text_ar' => Schema::TYPE_TEXT,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221211_105935_hadis cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221211_105935_hadis cannot be reverted.\n";

        return false;
    }
    */
}
