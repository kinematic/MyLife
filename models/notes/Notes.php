<?php

namespace app\models\notes;

use Yii;

/**
 * This is the model class for table "notes_notes".
 *
 * @property integer $id
 * @property integer $categoryid
 * @property string $name
 * @property string $description
 */
class Notes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notes_notes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categoryid', 'name', 'description'], 'required'],
            [['categoryid'], 'integer'],
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
            'categoryid' => 'категория',
			'category.name' => 'категория',
            'name' => 'название',
            'description' => 'содержание',
        ];
    }

    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'categoryid']);
    }
}
