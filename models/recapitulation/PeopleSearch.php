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
            [['id'], 'integer'],
            [['firstname', 'description'], 'safe'],
            [['fullname'], 'safe'],
			[['fullname'], 'trim'],
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
        $query = People::find();
		$query->leftJoin('recapitulation_secondnames as rs', 'rs.id = secondnameid');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pagesize' => 50,
            ],
        ]);

        $dataProvider->setSort([
	    'attributes' => [
// 		'id',
		'fullname' => [
		    'asc' => ['firstname' => SORT_ASC],
		    'desc' => ['firstname' => SORT_DESC],
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

        $query->filterWhere(['like', 'firstname', $this->fullname]);
		$query->orFilterWhere(['like', 'rs.name', $this->fullname]);
		$query->andFilterWhere(['like', 'description', $this->description]);

		$query->orderBy('firstname, rs.name');

        return $dataProvider;
    }
}
