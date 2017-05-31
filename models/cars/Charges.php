<?php

namespace app\models\cars;

use Yii;

/**
 * This is the model class for table "{{%fuel_charges}}".
 *
 * @property integer $id
 * @property integer $road_id
 * @property string $date
 * @property double $charge
 */
class Charges extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cars_charges';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['road_id', 'date', 'charge'], 'required'],
            [['road_id', 'odometer'], 'integer'],
            [['date'], 'safe'],
            [['charge'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'road_id' => 'путёвка',
            'date' => 'дата',
            'charge' => 'заправлено, л',
            'roadname' => 'путёвка',
            'odometer' => 'одометр, км',
			'nextcharge' => 'следующая заправка, км',
        ];
    }
    
        /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoad()
    {
        return $this->hasOne(Road::className(), ['id' => 'road_id']);
    }
    
    public function getRoadname()
    {
        return $this->road->date;
    }

	public function getNextcharge()
	{
		return round($this->odometer + $this->charge * 100 / $this->road->car->model->consumption, 0);
		

	}

}
