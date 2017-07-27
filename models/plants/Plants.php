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

    public $file;
    public $delImg;
    public $mainImg;


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
            [['file'], 'image', 'extensions' => 'png, jpg'],
//             [['delImg'], 'safe'],
            ['delImg', 'each', 'rule' => ['integer']],
//             ['mainImg', 'each', 'rule' => ['']],
            ['mainImg', 'integer'],
//             ['landing', 'date'],
            [['landing'], 'date', 'format' => 'yyyy-M-d'],
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
            'landing' => 'год высадки',
            'file' => 'фото',
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
    
    /**
     * @return \yii\db\ActiveQuery
     */
//     public function getPicture()
//     {
//         return Pictures::find()->select('name')->where(['plantid' => $this->id])->limit(1)->one();
//     }
}
