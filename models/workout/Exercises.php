<?php

namespace app\models\workout;

use Yii;

/**
 * This is the model class for table "workout_exercises".
 *
 * @property int $id
 * @property string $name
 */
class Exercises extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'workout_exercises';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'название',
        ];
    }
}
