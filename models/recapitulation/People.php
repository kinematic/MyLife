<?php

namespace app\models\recapitulation;

use Yii;
use app\models\recapitulation\Tags;
use sjaakp\taggable\TaggableBehavior;

/**
 * This is the model class for table "{{%recapitulation_people}}".
 *
 * @property integer $id
 * @property string $firstname
 * @property integer $secondnameid
 * @property integer $patronymicnameid
 * @property string $description
 */
class People extends \yii\db\ActiveRecord
{
	public $secondname;
	public $patronymicname;
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
            [['firstname', 'secondname', 'patronymicname'], 'string', 'max' => 50],
			[['firstname', 'secondname', 'patronymicname'], 'trim'],
            [['editorTags'], 'safe'],
            [['firstname', 'description'], 'default', 'value' => NULL],
			[['secondnameid', 'patronymicnameid'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'фамилия',
			'secondname' => 'имя',
			'patronymicname' => 'отчество',
            'description' => 'описание',
            'fullname' => 'имя',
            'editorTags' => 'свойства',
        ];
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

    public function getSname() {
         return $this->hasOne(Secondnames::className(), [ 'id' => 'secondnameid' ]);
    }

    public function getPname() {
         return $this->hasOne(Patronymicnames::className(), [ 'id' => 'patronymicnameid' ]);
    }
    
    public function getFullname()
    {
        return trim($this->firstname . ' ' . $this->sname['name'] . ' ' . $this->pname['name']);
    }

}
