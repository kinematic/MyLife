<?php

namespace app\models\cars;

use Yii;

/**
 * This is the model class for table "cars_cars".
 *
 * @property integer $id
 * @property string $license
 * @property integer $modelid
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
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'license' => 'License',
            'modelid' => 'Modelid',
        ];
    }
    
        /**
     * @return \yii\db\ActiveQuery
     */
    public function getModel()
    {
        return $this->hasOne(Models::className(), ['id' => 'modelid']);
    }
    
    public function getModelname()
    {
        return $this->model->name;
    }
    
    public function getConsumption()
    {
        return $this->model->consumption;
    }
    
    public function getCarname()
    {
        return $this->model->name . ' ' . $this->license;
    }
}
