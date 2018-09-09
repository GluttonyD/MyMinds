<?php

use yii\db\Migration;

/**
 * Class m180909_194806_change_card_pos_col
 */
class m180909_194806_change_card_pos_col extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('card','xPos');
        $this->dropColumn('card','yPos');
        $this->addColumn('card','xPos',$this->double());
        $this->addColumn('card','yPos',$this->double());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('card','xPos');
        $this->dropColumn('card','yPos');
        $this->addColumn('card','xPos',$this->integer());
        $this->addColumn('card','yPos',$this->integer());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180909_194806_change_card_pos_col cannot be reverted.\n";

        return false;
    }
    */
}
