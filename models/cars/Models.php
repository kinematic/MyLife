<?php

namespace app\models\cars;

use Yii;

/**
 * This is the model class for table "cars_models".
 *
 * @property integer $id
 * @property string $name
 * @property integer $tank
 * @property integer $division
 * @property string $consumption
 */
class Models extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cars_models';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['tank', 'division'], 'integer'],
            [['consumption'], 'number'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'название',
            'tank' => 'ёмкость бака, л',
            'division' => 'деления бака',
            'consumption' => 'расход, л/ 100 км',
        ];
    }
}
