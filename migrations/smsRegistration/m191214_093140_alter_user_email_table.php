<?php

use yii\db\Migration;

/**
 * Class m191214_093140_alter_user_email_table
 */
class m191214_093140_alter_user_email_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('{{%user}}', 'email', $this->string(255)->null()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('{{%user}}', 'email', $this->string(255)->notNull());
    }
}
