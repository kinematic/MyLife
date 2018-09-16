<?php

namespace app\models\plants;

use Yii;
use yii\web\UploadedFile;
use app\models\plants\Pictures;

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

    public $delImg;
    public $imageFiles;

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
            [['plantspeciesid', 'pictureid'], 'integer'],
            [['description', 'name'], 'string'],
			[['description', 'pictureid'], 'default', 'value' => null],
            ['delImg', 'each', 'rule' => ['integer']],
			[['landing'], 'safe'],
			[['imageFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 4,'checkExtensionByMimeType'=>false],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plantspeciesid' => 'вид',
            'species.name' => 'вид',
            'name' => 'название',
            'description' => 'описание',
            'landing' => 'год высадки',
			'imageFiles' => 'загрузить фото',
			'pictureid' => 'фото',
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
        return $this->hasMany(Pictures::className(), ['plantid' => 'id']);
    }
    
}
