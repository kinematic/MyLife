<?php

namespace app\models\plants;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\plants\Plants;

/**
 * PlantsSearch represents the model behind the search form about `app\models\plants\Plants`.
 */
class PlantsSearch extends Plants
{
    public $speciesID;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'plantspeciesid', 'speciesID'], 'integer'],
//             [['description'], 'safe'],
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
        $query = Plants::find();

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
//         $query->andFilterWhere([
//             'id' => $this->id,
//             'plantspeciesid' => $this->plantspeciesid,
//             'name' => $this->name,
//         ]);

//         $query->andFilterWhere(['like', 'description', $this->description]);
        $query->andFilterWhere(['plantspeciesid' => $this->speciesID]);

        //сортировка
        $query->innerJoinWith(['species']);
        $query->orderBy('plants_species.name, name');
        
        return $dataProvider;
    }
}
