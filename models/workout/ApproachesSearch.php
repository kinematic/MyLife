<?php

namespace app\models\workout;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\workout\Approaches;

/**
 * ApproachesSearch represents the model behind the search form of `app\models\workout\Approaches`.
 */
class ApproachesSearch extends Approaches
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'exerciseid', 'placeid', 'approach1', 'approach2', 'approach3', 'approach4', 'approach5'], 'integer'],
            [['date'], 'safe'],
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
        $query = Approaches::find();

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
            'placeid' => $this->placeid,
            'exerciseid' => $this->exerciseid,
//             'approach1' => $this->approach1,
//             'approach2' => $this->approach2,
//             'approach3' => $this->approach3,
//             'approach4' => $this->approach4,
//             'approach5' => $this->approach5,
        ]);
		$query->orderBy('date DESC');
        return $dataProvider;
    }
}
