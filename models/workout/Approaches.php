<?php

namespace app\models\workout;

use Yii;

/**
 * This is the model class for table "workout_approaches".
 *
 * @property int $id
 * @property string $date
 * @property int $exerciseid
 * @property int $approach1
 * @property int $approach2
 * @property int $approach3
 * @property int $approach4
 * @property int $approach5
 * @property int $approach6
 */
class Approaches extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'workout_approaches';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'placeid', 'exerciseid', 'approach1', 'approach2', 'approach3', 'approach4', 'approach5', 'approach6'], 'required'],
            [['date'], 'safe'],
            [['exerciseid', 'placeid', 'approach1', 'approach2', 'approach3', 'approach4', 'approach5', 'approach6'], 'integer'],
// 			[['approache1', 'approache2', 'approach3', 'approach4', 'approach5'], 'default', 'value' => 6],
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
            'placeid' => 'место',
            'place.name' => 'место',
            'exerciseid' => 'упражение',
            'approach1' => 'подход 1, раз',
            'approach2' => 'подход 2, раз',
            'approach3' => 'подход 3, раз',
            'approach4' => 'подход 4, раз',
            'approach5' => 'подход 5, раз',
            'approach6' => 'подход 6, раз',
			'coefficient' => 'коэффициент',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExercise()
    {
        return $this->hasOne(Exercises::className(), ['id' => 'exerciseid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoefficient()
    {
        $sum = 0;
        $count = 0;
        for ($i = 1; $i <= 6; $i++) {
            $a = 'approach' . $i;
            if ($this->$a) { 
                $sum += $this->$a;
                $count += 1;
            }
        }
        return round(($sum) / $count, 1);
    }
    
        
	public function getPlace()
    {
        return $this->hasOne(Places::className(), ['id' => 'placeid']);
    }
}
