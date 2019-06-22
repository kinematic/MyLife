<?php

namespace app\models\notes;

use Yii;

/**
 * This is the model class for table "notes_categories".
 *
 * @property integer $id
 * @property string $name
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notes_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
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
        ];
    }

	public function getNotes()
	{
		$this->hasMany(Notes::className(), ['id' => 'categoryid']); 
	}
}
