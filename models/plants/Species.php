<?php

namespace app\models\plants;

use Yii;

/**
 * This is the model class for table "plants_species".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 */
class Species extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plants_species';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 150],
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
        ];
    }
}
