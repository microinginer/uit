<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_sms_confirm}}`.
 */
class m191214_064616_create_user_sms_confirm_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_sms_confirm}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->dateTime()->notNull(),
            'code' => $this->string(10)->notNull(),
            'phone' => $this->string(255)->notNull(),
            'user_agent' => $this->string(255)->null(),
            'ip' => $this->string(15)->null(),
            'message' => $this->string(255)->null(),
            'type' => $this->smallInteger()->notNull()->defaultValue(10),
        ]);

        $this->createIndex('IDX_user_sms_confirm_phone_code', 'user_sms_confirm', ['phone', 'code']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('IDX_user_sms_confirm_phone_code', 'user_sms_confirm');
        $this->dropTable('{{%user_sms_confirm}}');
    }
}
