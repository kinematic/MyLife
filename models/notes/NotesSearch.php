<?php

namespace app\models\notes;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\notes\Notes;

/**
 * NotesSearch represents the model behind the search form about `app\models\notes\Notes`.
 */
class NotesSearch extends Notes
{

    public $categoryID;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'categoryID'], 'integer'],
            [['name', 'description'], 'safe'],
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
        $query = Notes::find()
        ->innerJoinWith('category')
        ->orderBy('notes_categories.name, notes_notes.name');

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
            'categoryid' => $this->categoryID,
        ]);

        $query->andFilterWhere(['like', 'notes_notes.name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
