<?php

use yii\db\Migration;

/**
 * Class m180903_194038_card_table
 */
class m180903_194038_card_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('card',[
            'id'=>$this->bigPrimaryKey(),
            'field_id'=>$this->bigInteger(),
            'text'=>$this->text(),
            'xPos'=>$this->integer(),
            'yPos'=>$this->integer()
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('card');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180903_194038_card_table cannot be reverted.\n";

        return false;
    }
    */
}
