<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Skill;

/**
 * SkillSearch represents the model behind the search form of `backend\models\Skill`.
 */
class SkillSearch extends Skill
{
    public $hero_name;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'hero_id', 'damage', 'mana'], 'integer'],
            [['level', 'name', 'description','hero_name'], 'safe'], //@imp 增加查询需要添加安全搜索
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
        $query = Skill::find();
        /**
         * @imp 关联查询
         */
        $query->joinWith(['hero']);
        // add conditions that should always apply here

        $query->distinct(true);

        $query->groupBy('name');

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
            'hero_id' => $this->hero_id,
            'damage' => $this->damage,
            'mana' => $this->mana,
        ]);

        $query->andFilterWhere(['like', 'level', $this->level])
            ->andFilterWhere(['like', 'skill.name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'hero.name', $this->hero_name]); //@imp 查询功能
        return $dataProvider;
    }
}
