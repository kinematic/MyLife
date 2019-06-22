<?php

namespace app\models\workout;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\workout\Runing;

/**
 * RuningSearch represents the model behind the search form of `app\models\workout\Runing`.
 */
class RuningSearch extends Runing
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'duration'], 'integer'],
            [['date'], 'safe'],
            [['distance'], 'number'],
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
        $query = Runing::find();

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
            'date' => $this->date,
            'distance' => $this->distance,
            'duration' => $this->duration,
        ]);

		$query->orderBy('date DESC');

        return $dataProvider;
    }
}
