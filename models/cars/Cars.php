<?php

namespace app\models\cars;

use Yii;

/**
 * This is the model class for table "cars_cars".
 *
 * @property integer $id
 * @property string $license
 * @property string $vin
 * @property integer $modelid
 * @property string $description
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
            [['license', 'modelid'], 'required'],
            [['modelid'], 'integer'],
            [['license'], 'string', 'max' => 8],
			[['vin'], 'string', 'max' => 17],
			[['description'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'license' => 'номер',
			'vin' => 'VIN',
            'modelid' => 'модель',
			'description' => 'описание',
        ];
    }
    
        /**
     * @return \yii\db\ActiveQuery
     */
    public function getModel()
    {
        return $this->hasOne(Models::className(), ['id' => 'modelid']);
    }
    
    public function getCarname()
    {
        return $this->model->name . ' ' . $this->license;
    }
}
