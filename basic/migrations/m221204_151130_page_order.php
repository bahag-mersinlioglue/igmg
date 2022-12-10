<?php

use yii\db\Migration;

/**
 * Class m221204_151130_page_order
 */
class m221204_151130_page_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('hutbe_page', 'page_number', 'int');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221204_151130_page_order cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221204_151130_page_order cannot be reverted.\n";

        return false;
    }
    */
}
