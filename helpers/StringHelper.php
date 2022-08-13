<?php


namespace app\helpers;


/**
 * Class StringHelper
 * @package app\helpers
 */
class StringHelper extends \yii\helpers\StringHelper
{
    public static function phoneClear($phone)
    {
        return str_replace(['+', '(', ' ', ')', '-',], '', trim($phone));
    }
}
