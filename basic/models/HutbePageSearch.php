<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\HutbePage;

/**
 * HutbePageSearch represents the model behind the search form of `app\models\HutbePage`.
 */
class HutbePageSearch extends HutbePage
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'hutbe_id'], 'integer'],
            [['de', 'tr', 'ar'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = HutbePage::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'hutbe_id' => $this->hutbe_id,
        ]);

        $query->andFilterWhere(['like', 'de', $this->de])
            ->andFilterWhere(['like', 'tr', $this->tr])
            ->andFilterWhere(['like', 'ar', $this->ar]);

        return $dataProvider;
    }
}
