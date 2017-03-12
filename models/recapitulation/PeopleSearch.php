<?php

namespace app\models\recapitulation;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\recapitulation\People;

/**
 * PeopleSearch represents the model behind the search form about `app\models\recapitulation\People`.
 */
class PeopleSearch extends People
{
	public $fullname;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['people_id'], 'integer'],
            [['first_name', 'second_name', 'middle_name', 'description'], 'safe'],
            [['fullname'], 'safe'],
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
        $query = People::find()->orderBy('first_name')->addOrderBy('second_name');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pagesize' => 50,
            ],
        ]);

        $dataProvider->setSort([
	    'attributes' => [
		'id',
		'fullname' => [
		    'asc' => ['first_name' => SORT_ASC, 'second_name' => SORT_ASC],
		    'desc' => ['first_name' => SORT_DESC, 'second_name' => SORT_DESC],
		    'label' => 'имя',
		    'default' => SORT_ASC
		],
		//'description',
	    ]
	]);
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
//         $query->andFilterWhere([
//             'people_id' => $this->people_id,
//         ]);

//         $query->andFilterWhere(['like', 'first_name', $this->first_name])
//             ->andFilterWhere(['like', 'second_name', $this->second_name])
//             ->andFilterWhere(['like', 'middle_name', $this->middle_name])
//             ->andFilterWhere(['like', 'description', $this->description])
	    $query->andWhere('first_name LIKE "%' . $this->fullname . '%" ' .
	    'OR second_name LIKE "%' . $this->fullname . '%"');

        return $dataProvider;
    }
}
