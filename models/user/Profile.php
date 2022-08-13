<?php

namespace app\models\user;
/**
 * @property $phone string
 */
class Profile extends \Da\User\Model\Profile
{
    /** @inheritDoc */
    public function rules()
    {
        $rules = parent::rules();

        $rules['nameUnique'] = ['name', 'unique'];
        $rules['phone'] = ['phone', 'string'];

        return $rules;
    }

    /** @inheritDoc */
    public function fields()
    {
        return [
            'phone',
            'fio' => function () {
                return $this->name;
            },
            'email' => function () {
                return $this->public_email;
            }
        ];
    }
}
