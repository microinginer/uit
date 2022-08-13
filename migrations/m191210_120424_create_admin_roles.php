<?php

use yii\db\Migration;

/**
 * Class m191210_120424_create_admin_roles
 */
class m191210_120424_create_admin_roles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $role = Yii::$app->authManager->createRole('admin');
        $role->description = Yii::t('app', 'Administrator');
        Yii::$app->authManager->add($role);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $role = Yii::$app->authManager->getRole('admin');

        Yii::$app->authManager->remove($role);
    }
}
