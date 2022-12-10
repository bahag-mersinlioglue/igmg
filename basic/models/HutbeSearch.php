<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Hutbe;

/**
 * HutbeSearch represents the model behind the search form of `app\models\Hutbe`.
 */
class HutbeSearch extends Hutbe
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'hafta'], 'integer'],
            [['tarih'], 'safe'],
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
        $query = Hutbe::find();

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
            'tarih' => $this->tarih,
            'hafta' => $this->hafta,
        ]);

        return $dataProvider;
    }
}
