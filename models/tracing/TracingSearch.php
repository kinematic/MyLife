<?php

namespace app\models\tracing;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\tracing\Tracing;

/**
 * TracingSearch represents the model behind the search form of `app\models\tracing\Tracing`.
 */
class TracingSearch extends Tracing
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['trace_id', 'model_id', 'tag_id', 'ord'], 'integer'],
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
        $query = Tracing::find();

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
            'trace_id' => $this->trace_id,
            'model_id' => $this->model_id,
            'tag_id' => $this->tag_id,
            'ord' => $this->ord,
        ]);

        return $dataProvider;
    }
}
