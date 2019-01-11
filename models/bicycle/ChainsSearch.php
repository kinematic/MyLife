<?php

namespace app\models\bicycle;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\bicycle\Chains;

/**
 * ChainsSearch represents the model behind the search form of `app\models\bicycle\Chains`.
 */
class ChainsSearch extends Chains
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'chainid', 'bikeid'], 'integer'],
            [['date'], 'safe'],
            [['size'], 'number'],
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
        $query = Chains::find();

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
            'chainid' => $this->chainid,
            'bikeid' => $this->bikeid,
            'date' => $this->date,
            'size' => $this->size,
        ]);

        return $dataProvider;
    }
}
