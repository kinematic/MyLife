<?php

namespace app\models\workout;

use Yii;

/**
 * This is the model class for table "workout_runing".
 *
 * @property int $id
 * @property string $date
 * @property string $distance
 * @property int $duration
 */
class Runing extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'workout_runing';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'duration'], 'required'],
            [['duration'], 'integer'],
            [['date'], 'safe'],
            [['distance'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'дата',
            'distance' => 'раст., км',
            'duration' => 'длит., мин',
            'temp' => 'темп, мин/км',
            'speed' => 'скор., км/ч',
        ];
    }
    
    public function getTemp(){
        return round($this->duration / $this->distance, 1);
    }
    
    public function getSpeed(){
        return round($this->distance / ($this->duration / 60), 1);
    }
}
