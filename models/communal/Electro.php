<?php

namespace app\models\communal;

use Yii;

/**
 * This is the model class for table "communal_electro".
 *
 * @property integer $id
 * @property string $date
 * @property integer $indications
 */
class Electro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'communal_electro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'indications'], 'required'],
            [['date'], 'safe'],
            [['indications'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'дата',
            'indications' => 'показания, кВт*ч',
			'consumption' => 'расход, кВт*ч',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrevval()
    {
		return Electro::find()->where(['<', 'date', $this->date])->orderBy('date DESC')->one();

    }

	public function getConsumption()
	{
		//return $this->indications - $this->prevval->indications;
	if(isset($this->prevval->indications)) return $this->indications - $this->prevval->indications;
	else return null;
// 	return $this->prevval->indications;
		
	}
}
