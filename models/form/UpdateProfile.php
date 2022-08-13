<?php

namespace app\models\form;

use app\models\user\Profile;
use yii\base\Model;
use yii\db\Exception;

/**
 *
 */
class UpdateProfile extends Model
{
    /**
     * @var string
     */
    public $fio;
    /**
     * @var string
     */
    public $email;
    /**
     * @var string
     */
    public $phone;

    /**
     * @var Profile
     */
    private $profile;

    public function rules()
    {
        return [
            [['fio', 'email', 'phone'], 'required'],
            [['fio', 'email', 'phone'], 'string'],
            [['email'], 'email'],
        ];
    }

    public function handle(): bool
    {
        try {
            $profile = $this->getProfile();

            $profile->name = $this->fio;
            $profile->public_email = $this->email;
            $profile->phone = $this->phone;

            if (!$profile->save()) {
                $this->addErrors($profile->getErrors());
                throw new Exception('Profile not saved');
            }

            return true;
        } catch (\Exception $exception) {
            $this->addError('error', $exception->getMessage());
        }

        return false;
    }

    /**
     * @return Profile
     */
    public function getProfile(): Profile
    {
        return $this->profile;
    }

    /**
     * @param Profile $profile
     */
    public function setProfile(Profile $profile): void
    {
        $this->profile = $profile;
    }

    public function formName()
    {
        return '';
    }
}
