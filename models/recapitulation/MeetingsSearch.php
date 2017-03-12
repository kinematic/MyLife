<?php

namespace app\models\recapitulation;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\recapitulation\Meetings;

/**
 * MeetingsSearch represents the model behind the search form about `app\models\recapitulation\Meetings`.
 */
class MeetingsSearch extends Meetings
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'manid', 'placeid'], 'integer'],
            [['description', 'startdate', 'enddate'], 'safe'],
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
        $query = Meetings::find();

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
            'manid' => $this->manid,
            'placeid' => $this->placeid,
            'startdate' => $this->startdate,
            'enddate' => $this->enddate,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
