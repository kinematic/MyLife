<?php

namespace app\models\workout;

use Yii;

/**
 * This is the model class for table "workout_bodysizes".
 *
 * @property int $id
 * @property int $partid
 * @property int $value
 */
class Bodysizes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'workout_bodysizes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['partid', 'placeid', 'value'], 'required'],
            [['partid', 'placeid'], 'integer'],
			[['value'], 'number'],
			[['date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
			'date' => 'дата',
			'placeid' => 'место',
			'place.name' => 'место',
            'partid' => 'часть тела',
            'value' => 'значение',
        ];
    }

	public function getPartofbody()
    {
        return $this->hasOne(Partsofbody::className(), ['id' => 'partid']);
    }
    
	public function getPlace()
    {
        return $this->hasOne(Places::className(), ['id' => 'placeid']);
    }
}
