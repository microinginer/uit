<?php

namespace app\commands;


use Yii;
use app\models\user\User;
use yii\base\ErrorException;
use yii\console\Controller;

class AssignController extends Controller
{
    public function actionRole($username, $role)
    {
        if (!$model = User::findOne(['username' => $username])) {
            throw new ErrorException($username . " not found");
        }

        if (!$userRole = Yii::$app->authManager->getRole($role)) {
            throw new ErrorException($role . " not found");
        }

        Yii::$app->authManager->assign($userRole, $model->id);

        exit;
    }
}
