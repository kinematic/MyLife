<?php

namespace app\models\tracing;

use Yii;
use app\models\tracing\Tags;
use sjaakp\taggable\TaggableBehavior;

/**
 * This is the model class for table "tracing_groups".
 *
 * @property int $id
 * @property string $date
 * @property string $name
 */
class Groups extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tracing_groups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['editorTags'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'дата',
            'name' => 'название',
            'editorTags' => 'действия',
        ];
    }
    
    public function behaviors()
    {
        return [
            'taggable' => [
                'class' => TaggableBehavior::className(),
                'tagClass' => Tags::className(),
                'junctionTable' => 'tracing_tracing',
            ]
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
		return (new \yii\db\Query())
		    ->select('tt.trace_id id, ta.name, tt.ord ord')
		    ->from('tracing_tags ta')	
			->leftJoin('tracing_tracing tt', 'tt.tag_id = ta.id')
			->where('tt.model_id = ' . $this->id)
			->orderBy('tt.ord DESC')
			->all();
    }

    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaxord()
    {
		return (new \yii\db\Query())
		    ->select('ord')
		    ->from('tracing_tracing tt')	
			->where('tt.model_id = ' . $this->id)
			->max('tt.ord')
			;
    }
}
