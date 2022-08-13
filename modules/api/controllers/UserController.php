<?php

namespace app\modules\api\controllers;

use app\components\Response;
use app\models\form\UpdateProfile;
use app\models\user\User;
use app\models\user\UserSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\ContentNegotiator;
use yii\filters\VerbFilter;
use yii\rest\Controller;
use yii\web\ForbiddenHttpException;

/**
 * Default controller for the `api` module
 */
class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'content' => [
                'class' => ContentNegotiator::class,
                'formats' => [Response::FORMAT_META_JSON],
            ],
            'access' => [
                'class' => AccessControl::class,
                'only' => ['token'],
                'rules' => [
                    [
                        'actions' => ['token'],
                        'allow' => true,
                    ]
                ],
            ],

            'authenticatorBearer' => [
                'class' => HttpBearerAuth::class,
                'only' => ['update'],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'token' => ['GET', 'HEAD'],
                    'update' => ['POST'],
                ],
            ],
            'authenticator' => [
                'class' => HttpBasicAuth::class,
                'only' => ['token'],
                'auth' => function ($username, $password) {
                    $user = User::findOne(['username' => $username]);
                    if (null === $user) {
                        return null;
                    }

                    if (!Yii::$app->getSecurity()->validatePassword($password, $user->password_hash)) {
                        return null;
                    }
                    return $user;
                }
            ],
        ];
    }

    /**
     * Renders the index view for the module
     * @return []
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        return $searchModel->search(Yii::$app->getRequest()->get());
    }


    public function actionToken()
    {
        /** @var User $user */
        if (null === ($user = Yii::$app->user->getIdentity())) {
            throw new ForbiddenHttpException('Error Identity');
        }

        return [
            'id' => $user->getId(),
            'token' => $user->getToken(),
        ];
    }

    public function actionUpdate()
    {
        /** @var User $user */
        $user = \Yii::$app->getUser()->getIdentity();
        $model = new UpdateProfile();
        $model->setProfile($user->profile);

        if ($model->load(\Yii::$app->getRequest()->post()) && $model->validate() && $model->handle()) {
            return $model->getProfile()->toArray();
        }

        return [
            'errors' => $model->getErrors(),
        ];
    }
}
