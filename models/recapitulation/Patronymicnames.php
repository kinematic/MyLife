<?php

namespace app\models\recapitulation;

use Yii;

/**
 * This is the model class for table "recapitulation_patronymicnames".
 *
 * @property int $id
 * @property string $name
 */
class Patronymicnames extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recapitulation_patronymicnames';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 15],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }
}
