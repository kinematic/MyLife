<?php

namespace app\models\plants;

use Yii;

/**
 * This is the model class for table "plants".
 *
 * @property integer $id
 * @property integer $plantspeciesid
 * @property integer $name
 * @property string $description
 */
class Plants extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plants';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plantspeciesid', 'name'], 'required'],
            [['plantspeciesid'], 'integer'],
            [['description', 'name'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
//             'id' => 'ID',
            'plantspeciesid' => 'вид',
            'species.name' => 'вид',
            'name' => 'название',
            'description' => 'описание',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecies()
    {
        return $this->hasOne(Species::className(), ['id' => 'plantspeciesid']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPictures()
    {
        return $this->hasOne(Pictures::className(), ['id' => 'plantid']);
    }
}
