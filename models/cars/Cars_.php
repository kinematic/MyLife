<?php

namespace app\models\cars;

use Yii;

/**
 * This is the model class for table "fuel_cars".
 *
 * @property integer $id
 * @property string $name
 * @property integer $tank
 * @property integer $division
 * @property string $consumption
 */
class Cars extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cars_cars';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'license', 'tank', 'division', 'consumption'], 'required'],
            [['tank', 'division'], 'integer'],
            [['consumption'], 'number'],
            [['name'], 'string', 'max' => 100],
            [['license'], 'string', 'max' => 8],
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
            'license' => 'номер',
            'tank' => 'бак',
            'division' => 'делений бака',
            'consumption' => 'расход, л/100 км',
        ];
    }
    
    public function getCarname()
    {
        return $this->name . ' ' . $this->license;
    }
}
