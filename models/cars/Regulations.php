<?php

namespace app\models\cars;
// use app\models\bookkeeping\Catalog;
use app\models\bookkeeping\Catalog;

use Yii;

/**
 * This is the model class for table "vw_regulations".
 *
 * @property integer $id
 * @property string $name
 * @property string $catalogid
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
            [['interval', 'period', 'catalogid'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['period', 'catalogid'], 'default', 'value' => NULL],
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
            'catalogid' => 'название в каталоге',
            'catalog.name' => 'название в каталоге',
            'description' => 'описание',
            'interval' => 'интервал, км',
            'period' => 'период, лет',
        ];
    }
    
    public function getCatalog()
    {
        return $this->hasOne(Catalog::className(), ['id' => 'catalogid']);
    }
}
