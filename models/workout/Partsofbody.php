<?php

namespace app\models\workout;

use Yii;

/**
 * This is the model class for table "workout_partsofbody".
 *
 * @property int $id
 * @property string $name
 * @property string $measurement
 */
class Partsofbody extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'workout_partsofbody';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'measurement'], 'required'],
            [['name'], 'string', 'max' => 20],
            [['measurement'], 'string', 'max' => 2],
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
            'measurement' => 'ед.изм.',
        ];
    }
}
