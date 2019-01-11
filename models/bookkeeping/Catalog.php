<?php

namespace app\models\bookkeeping;

use Yii;

/**
 * This is the model class for table "bookkeeping_catalog".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 */
class Catalog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bookkeeping_catalog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
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

	public function getRecord()
	{
		return $this->hasMany(Records::className(), ['catalogid' => 'id']);;
	}
}
