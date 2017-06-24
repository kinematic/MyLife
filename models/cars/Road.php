<?php

namespace app\models\cars;

use Yii;

/**
 * This is the model class for table "cars_road".
 *
 * @property integer $id
 * @property string $date
 * @property integer $carid
 * @property integer $odometer
 * @property integer $tank
 */
class Road extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cars_road';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'carid', 'odometer', 'tank'], 'required'],
            [['date'], 'safe'],
            [['carid', 'odometer'], 'integer'],
            [['tank', 'fullCharge'], 'number'],
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
            'carid' => 'автомобиль',
            'carname' => 'автомобиль',
            'odometer' => 'одометр, км',
            'tank' => 'бак, л',
            'fullCharge' => 'заправлено, л',
            'mileage' => 'пробег, км',
            'fuelConsumption' => 'расход, л/100 км',
            'surplus' => 'излишки, л',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCar()
    {
        return $this->hasOne(Cars::className(), ['id' => 'carid']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharges3()
    {
        return $this->hasMany(Charges::className(), ['road_id' => 'id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFullCharge()
    {
        $row = (new \yii\db\Query())
	        ->select(['sum(charge)'])
	        ->from('cars_charges')
	        ->where('road_id = :thisid')
	        ->addParams([':thisid' => $this->id])
	        ->limit(1)
	        ->one();
        
        if($row['sum(charge)']) return $row['sum(charge)'];
        else return 0;
        //return if(isset($row['sum(charge)')];

    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrevval()
    {
        if ($this->id) {
            $row = (new \yii\db\Query())
	            ->select(['r.odometer', 'r.tank'])
	            ->from('cars_road r')
	            ->join('INNER JOIN', 'cars_cars c', 'c.id = r.carid')
	            ->where('r.id < :thisid')
	            ->andWhere(['like', 'c.license', $this->car->license])
	            ->addParams([':thisid' => $this->id])
	            ->limit(1)
	            ->orderBy(['r.id' => SORT_DESC])
	            ->one();
        } else {
            $row = (new \yii\db\Query())
	            ->select(['odometer', 'tank'])
	            ->from('cars_road')
	            ->where(['carid' => 1])
	            ->limit(1)
	            ->orderBy(['id' => SORT_DESC])
	            ->one();
        }
        return $row;

    }
    
//     public function getTankValue()
//     {
//         if ($car == 1) $tankStop = $tankStop * 60 / 16; 
//         if ($car == 2) $tankStop = $tankStop * 50 / 10;
//         return round($tankStop, 0);
//     }
    
//     public function getPrevodometer()
//     {
//         return $this->prevval['odometer'];
//     }
//     
//     public function getPrevtank()
//     {
//         return $this->prevval['tank'];
//     }
//     
    public function getMileage()
    {
        //return $this->odometer - $this->prevodometer;
// 		return 10;
		
        if (isset($this->prevval['odometer'])) return $this->odometer - $this->prevval['odometer'];
        else return 0;
    }
    
    public function getDiffVol()
    {
        return round($this->prevval['tank'] + $this->fullCharge - $this->tank, 0);
    }
    
    public function getFuelConsumption ()
    {
        if (isset($this->mileage) and $this->mileage) return round(100 * $this->diffVol / $this->mileage, 1);
        else return NULL;
    }
    
    public function getSurplus()
    {
        if (isset($this->mileage)) return round($this->mileage * $this->car->consumption / 100 - $this->diffVol, 0);
        else return NULL;
    }
    
   public function getCarname()
   {
       return $this->car->license;
   }
   
    public function getRoadname()
    {
        return trim($this->date . ' ' . $this->car['license']);
    }
}
