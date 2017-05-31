<?php

namespace app\models\cars;

use Yii;

/**
 * This is the model class for table "cars_spareparts".
 *
 * @property integer $id
 * @property integer $modelid
 * @property string $partcode
 * @property string $description
 * @property string $information
 */
class Spareparts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cars_spareparts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['modelid', 'partcode'], 'required'],
            [['modelid'], 'integer'],
            [['description', 'information'], 'string'],
            [['partcode'], 'string', 'max' => 20],
            [['partcode'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'modelid' => 'автомобиль',
            'partcode' => 'код детали',
            'description' => 'описание',
			'information' => 'информация',
        ];
    }

	public function getModel(){
		return $this->hasOne(Models::className(), ['id' => 'modelid']);
		
	}
	
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->partcode = strtoupper($this->partcode);
            $this->partcode = str_replace(' ', '', $this->partcode);
            return parent::beforeSave($insert);
        } else {
            return false;
        }
    }
}
