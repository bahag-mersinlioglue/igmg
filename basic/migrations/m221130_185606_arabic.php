<?php

use yii\db\Migration;

/**
 * Class m221130_185606_arabic
 */
class m221130_185606_arabic extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->renameColumn('hutbe_page', 'en', 'tr');
        $this->addColumn('hutbe_page', 'ar', 'text');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221130_185606_arabic cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221130_185606_arabic cannot be reverted.\n";

        return false;
    }
    */
}
