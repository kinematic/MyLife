<?php

namespace app\models\recapitulation;

use Yii;

/**
 * This is the model class for table "{{%recapitulation_properties}}".
 *
 * @property integer $property_id
 * @property integer $model_id
 * @property integer $tag_id
 * @property integer $ord
 */
class Properties extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%recapitulation_properties}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model_id', 'tag_id'], 'required'],
            [['model_id', 'tag_id', 'ord'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'property_id' => 'Property ID',
            'model_id' => 'Model ID',
            'tag_id' => 'Tag ID',
            'ord' => 'Ord',
        ];
    }
}
