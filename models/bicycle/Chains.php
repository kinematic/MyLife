<?php

namespace app\models\bicycle;

use Yii;

/**
 * This is the model class for table "bicycle_chains".
 *
 * @property int $id
 * @property int $chainid
 * @property int $bikeid
 * @property string $date
 * @property double $size
 */
class Chains extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bicycle_chains';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['chainid', 'bikeid', 'date', 'size'], 'required'],
            [['chainid', 'bikeid'], 'integer'],
            [['date'], 'safe'],
            [['size'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'chainid' => 'цепь',
            'bikeid' => 'байк',
            'date' => 'дата',
            'size' => 'длина, см',
			'wear' => 'износ, %',
        ];
    }

	public function getWear()
	{
		return round(($this->size - 107.1) * 100 / 107.1, 2);
	}
}
