<?php

namespace app\models\workout;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\workout\Bodysizes;

/**
 * BodysizesSearch represents the model behind the search form of `app\models\workout\Bodysizes`.
 */
class BodysizesSearch extends Bodysizes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'partid', 'placeid'], 'integer'],
			[['value'], 'number'],
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
        $query = Bodysizes::find();

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
//             'id' => $this->id,
            'partid' => $this->partid,
			'placeid' => $this->placeid,
//             'value' => $this->value,
        ]);
		$query->orderBy('date DESC');
        return $dataProvider;
    }
}
