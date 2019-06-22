<?php

namespace app\models\workout;

use Yii;

/**
 * This is the model class for table "workout_places".
 *
 * @property int $id
 * @property string $name
 * @property string $descrition
 */
class Places extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'workout_places';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['descrition'], 'string'],
            [['name'], 'string', 'max' => 30],
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
            'descrition' => 'описание',
        ];
    }
}
