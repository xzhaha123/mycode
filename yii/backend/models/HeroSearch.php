<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Hero;

/**
 * HeroSearch represents the model behind the search form of `backend\models\Hero`.
 */
class HeroSearch extends Hero
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type', 'str', 'int', 'dex', 'hp', 'mp', 'min_atk', 'max_atk', 'dps', 'speed'], 'integer'],
            [['name'], 'safe'],
            [['def'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Hero::find();

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
            'type' => $this->type,
            'str' => $this->str,
            'int' => $this->int,
            'dex' => $this->dex,
            'hp' => $this->hp,
            'mp' => $this->mp,
            'min_atk' => $this->min_atk,
            'max_atk' => $this->max_atk,
            'def' => $this->def,
            'dps' => $this->dps,
            'speed' => $this->speed,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
