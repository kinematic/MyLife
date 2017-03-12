<?php

namespace app\models\recapitulation;
use sjaakp\taggable\TagBehavior;
use Yii;

/**
 * This is the model class for table "{{%recapitulation_tags}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $count
 */
class Tags extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%recapitulation_tags}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['count'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['name'], 'unique'],
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
            'count' => 'количество',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProperties()
    {
        return $this->hasMany(Properties::className(), ['tag_id' => 'tags.id']);
    }
    
    public function behaviors()
    {
        return [
            'tag' => [
                'class' => TagBehavior::className(),
                'junctionTable' => 'recapitulation_properties',
                'linkRoute' => 'recapitulation/tags/view',
            ]
        ];
    }
 
    public function getPeople() {
        return $this->hasMany(People::className(), [ 'people_id' => 'model_id' ])
            ->viaTable('recapitulation_properties', [ 'tag_id' => 'id' ]);
    }
}
