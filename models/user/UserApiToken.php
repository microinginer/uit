<?php


namespace app\models\user;


use Da\User\Model\Token;

/**
 * Class UserApiToken
 * @package common\models\user
 */
class UserApiToken extends Token
{
    const TYPE_API = 5;
}
