<?php

namespace app\models\bookkeeping;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\bookkeeping\Records;

/**
 * RecordsSearch represents the model behind the search form about `app\models\bookkeeping\Records`.
 */
class RecordsSearch extends Records
{

    public $catalogName;
    public $dateBegin;
    public $dateEnd;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'typeid', 'accountid', 'catalogid'], 'integer'],
            [['date', 'dateBegin', 'dateEnd', 'catalogName'], 'safe'],
            [['money'], 'number'],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'catalogName' => 'ценность',
            'dateBegin' => 'с даты',
            'dateEnd' => 'по дату',
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
        $query = Records::find();

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
        
        if(strlen($this->catalogName) >= 3) $queryCatalogIDs = Catalog::find()->select('id')->
        where(['like', 'name', '%' . $this->catalogName . '%', false])->asArray()->all();
        else $queryCatalogIDs = null;

        $tmpArray = [];
        if($queryCatalogIDs) {
            foreach($queryCatalogIDs as $catalog) {
                $tmpArray = $catalog['id'];
            }
        }
        // grid filtering conditions
        $query->andFilterWhere([
            'typeid' => $this->typeid,
            'accountid' => $this->accountid,
            'catalogid' => $tmpArray,
            'date' => $this->date,
        ]);
        
        $query->andFilterWhere(['>=', 'date', $this->dateBegin]);
        $query->andFilterWhere(['<=', 'date', $this->dateEnd]);
        
        $query->orderBy('date DESC');
        
        return $dataProvider;
    }
}