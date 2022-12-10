<?php

use yii\db\Migration;

/**
 * Class m221129_174538_init
 */
class m221129_174538_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
            create table hutbe
            (
                id    int auto_increment,
                tarih date not null,
                hafta int  not null,
                constraint hutbe_pk
                    primary key (id)
            );
            create table hutbe_page
            (
                id       int auto_increment,
                de       text null,
                en       text null,
                hutbe_id int  null,
                constraint hutbe_page_pk
                    primary key (id),
                constraint hutbe_page_hutbe_null_fk
                    foreign key (hutbe_id) references hutbe (id)
            );
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221129_174538_init cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221129_174538_init cannot be reverted.\n";

        return false;
    }
    */
}
