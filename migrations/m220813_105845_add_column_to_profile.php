<?php

use yii\db\Migration;

/**
 * Class m220813_105845_add_column_to_profile
 */
class m220813_105845_add_column_to_profile extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('profile','phone',$this->string(20)->null());
        $this->alterColumn('profile','name',$this->string(50)->null()->unique());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('profile','name',$this->string(50)->null());
        $this->dropColumn('profile','phone');
    }
}
