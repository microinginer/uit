<?php

namespace app\models\user;


use Da\User\Model\Token;
use yii\base\Exception;
use yii\behaviors\TimestampBehavior;

/**
 * @property  Profile $profile
 *
 * Class User
 * @package app\models\user
 */
class User extends \Da\User\Model\User
{
    /** @var string Default username regexp */
    public static $usernameRegexp = '/^[-a-zA-Z0-9_\.@\+]+$/';

    /** @inheritDoc */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => (new \DateTime())->format('Y-m-d H:i:s'),
            ],
        ];
    }

    /** @inheritDoc */
    public function rules()
    {
        $rules = parent::rules();
        $rules['usernameMatch'] = ['username', 'match', 'pattern' => self::$usernameRegexp];
        return $rules;
    }

    public function getCorrectName()
    {
        return $this->profile->name ?: $this->username;
    }

    /**
     * @return UserApiToken
     * @throws Exception
     */
    public function getToken()
    {
        $token = UserApiToken::findOne(['user_id' => $this->id, 'type' => UserApiToken::TYPE_API]);

        if (!$token) {
            $token = $this->generateApiToken();
        }

        return $token;
    }

    /**
     * Generates login token
     * @throws Exception
     */
    public function generateApiToken()
    {
        $token = new UserApiToken(['user_id' => $this->id]);
        $token->type = UserApiToken::TYPE_API;
        $token->code = \Yii::$app->security->generateRandomString();
        $token->save();

        return $token;
    }

    /** @inheritDoc */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $token = Token::findOne(['code' => $token, 'type' => UserApiToken::TYPE_API]);

        if ($token) {
            return static::findOne($token->user_id);
        }

        return $token;
    }

    /** @inheritDoc */
    public function fields()
    {
        return [
            'profile',
        ];
    }
}
