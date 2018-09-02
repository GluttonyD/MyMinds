<?php

use yii\db\Migration;

/**
 * Class m180902_183752_create_utable
 */
class m180902_183752_create_utable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user',[
            'id'=>$this->bigPrimaryKey(),
            'username'=>$this->string(),
            'email'=>$this->string(),
            'password_hash'=>$this->string(),
            'password_salt'=>$this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180902_183752_create_utable cannot be reverted.\n";

        return false;
    }
    */
}
