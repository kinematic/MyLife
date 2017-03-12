<?php

namespace app\models\cars;

use Yii;

/**
 * This is the model class for table "cars_models".
 *
 * @property integer $id
 * @property string $name
 * @property string $license
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
            'name' => 'Name',
            'license' => 'License',
            'tank' => 'Tank',
            'division' => 'Division',
            'consumption' => 'Consumption',
        ];
    }
}
