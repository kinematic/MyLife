<?php

namespace app\models\workout;

use Yii;

/**
 * This is the model class for table "workout_repetitions".
 *
 * @property int $id
 * @property string $date
 * @property int $placeid
 * @property int $exerciseid
 * @property int $repetitions
 */
class Repetitions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'workout_repetitions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'placeid', 'exerciseid', 'repetitions'], 'required'],
            [['date'], 'safe'],
            [['placeid', 'exerciseid', 'repetitions'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'placeid' => 'Placeid',
            'exerciseid' => 'Exerciseid',
            'repetitions' => 'Repetitions',
        ];
    }
}
