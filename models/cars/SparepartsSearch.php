<?php

namespace app\models\cars;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\cars\Spareparts;

/**
 * SparepartsSearch represents the model behind the search form about `app\models\cars\Spareparts`.
 */
class SparepartsSearch extends Spareparts
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'modelid'], 'integer'],
            [['partcode', 'description'], 'safe'],
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
        $query = Spareparts::find();

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
            'modelid' => $this->modelid,
        ]);

        $query->andFilterWhere(['like', 'partcode', $this->partcode])
            ->andFilterWhere(['like', 'description', $this->description])
            ->orFilterWhere(['like', 'information', $this->description]);
        
        $query->orderBy('partcode');

        return $dataProvider;
    }
}
