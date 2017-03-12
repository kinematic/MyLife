<?php

namespace app\models\recapitulation;

use Yii;

/**
 * This is the model class for table "{{%recapitulation_meetings}}".
 *
 * @property integer $id
 * @property integer $manid
 * @property integer $placeid
 * @property string $description
 * @property string $startdate
 * @property string $enddate
 */
class Meetings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%recapitulation_meetings}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['manid', 'placeid'], 'integer'],
            [['description'], 'string'],
            [['startdate', 'enddate'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'manid' => 'Manid',
            'placeid' => 'Placeid',
            'description' => 'Description',
            'startdate' => 'Startdate',
            'enddate' => 'Enddate',
        ];
    }
}
