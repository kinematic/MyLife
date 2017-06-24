<?php

namespace app\models\cars;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\cars\Road;

/**
 * RoadSearch represents the model behind the search form about `app\models\fuel\Road`.
 */
class RoadSearch extends Road
{
    public $carname;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'carid', 'odometer', 'tank'], 'integer'],
            //[['date'], 'safe'],
            [['carname'], 'safe'],
//             [['carname'],'string'],
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
        $query = Road::find()
        ->innerJoinWith('car')
        ->orderBy(['date' => SORT_DESC]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $dataProvider->setSort([
            'attributes' => [
//                 'carname' => [
//                     'asc' => ['cars_cars.license' => SORT_ASC],
//                     'desc' => ['cars_cars.license' => SORT_DESC],
//                     'label' => 'имя',
//                     'default' => SORT_ASC
//                 ],
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
            //'id' => $this->id,
//             'date' => $this->date,
//             'carname' => $this->carname,
//             'carid' => $this->carid,
//             'odometer' => $this->odometer,
//             'tank' => $this->tank,
//             'charges' => $this->charges,
//         ]);
        $query->andWhere('cars_cars.license LIKE "%' . $this->carname . '%"');
//         $query->andWhere('cars_cars.license LIKE "%2667%" ');
//         $query->andWhere('cars_cars.license LIKE null');
// print_r($this->carname);

        return $dataProvider;
    }
}
