<?php

use yii\db\Migration;

/**
 * Class m180903_193811_field_table
 */
class m180903_193811_field_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('field',[
           'id'=>$this->bigPrimaryKey(),
           'user_id'=>$this->bigInteger(),
           'name'=>$this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('field');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180903_193811_field_table cannot be reverted.\n";

        return false;
    }
    */
}
