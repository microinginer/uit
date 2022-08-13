<?php

namespace app\models\user;

use yii\data\ActiveDataProvider;

class UserSearch extends User
{
    public function search($params)
    {
        $query = User::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 8,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'email', $this->email]);
        $query->andFilterWhere(['like', 'username', $this->username]);

        return $dataProvider;
    }
}
