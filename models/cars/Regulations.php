<?php

namespace app\models\cars;

use Yii;

/**
 * This is the model class for table "vw_regulations".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $interval
 * @property integer $period
 */
class Regulations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cars_regulations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'interval'], 'required'],
            [['description'], 'string'],
            [['interval', 'period'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['period'], 'default', 'value' => NULL],
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
            'description' => 'описание',
            'interval' => 'интервал, км',
            'period' => 'период, лет',
        ];
    }
}
