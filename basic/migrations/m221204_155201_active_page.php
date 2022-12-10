<?php

use yii\db\Migration;

/**
 * Class m221204_155201_active_page
 */
class m221204_155201_active_page extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('hutbe_page', 'active', 'boolean');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221204_155201_active_page cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221204_155201_active_page cannot be reverted.\n";

        return false;
    }
    */
}
