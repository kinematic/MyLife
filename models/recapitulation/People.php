<?php

namespace app\models\recapitulation;

use Yii;
use app\models\recapitulation\Tags;
use sjaakp\taggable\TaggableBehavior;

/**
 * This is the model class for table "{{%recapitulation_people}}".
 *
 * @property integer $people_id
 * @property string $first_name
 * @property string $second_name
 * @property string $middle_name
 * @property string $description
 */
class People extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recapitulation_people';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['first_name', 'second_name', 'middle_name'], 'string', 'max' => 50],
            [['editorTags'], 'safe'],
            [['first_name', 'middle_name', 'second_name', 'description'], 'default', 'value' => NULL],
            //[['fullname'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'people_id' => 'People ID',
            'first_name' => 'фамилия',
            'second_name' => 'имя',
            'middle_name' => 'отчество',
            'description' => 'описание',
            'fullname' => 'имя',
            'editorTags' => 'свойства',
        ];
    }
    
    public function getFullname()
    {
        return trim($this->first_name . ' ' . $this->second_name);
    }
    
    public function behaviors()
    	{
	        return [
	            'taggable' => [
	                'class' => TaggableBehavior::className(),
	                'tagClass' => Tags::className(),
	                'junctionTable' => 'recapitulation_properties',
	            ]
	        ];
	    }
}
