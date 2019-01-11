<?php

namespace app\models\tracing;

use Yii;

/**
 * This is the model class for table "tracing_tracing".
 *
 * @property int $trace_id
 * @property int $model_id
 * @property int $tag_id
 * @property int $ord
 */
class Tracing extends \yii\db\ActiveRecord
{

	public $tag_name;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tracing_tracing';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['model_id', 'tag_id'], 'required'],
			[['tag_name'], 'required'],
			[['tag_name'], 'string'],
            [['model_id', 'tag_id', 'ord'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'trace_id' => 'id',
            'model_id' => 'группа',
            'tag_id' => 'движение',
			'tag_name' => 'движение',
            'ord' => 'порядок',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTagsorderlist()
    {
		return (new \yii\db\Query())
		    ->select(['tt.ord', 'concat(tt.ord, " ", ta.name) name'])
		    ->from('tracing_tags ta')	
			->leftJoin('tracing_tracing tt', 'tt.tag_id = ta.id')
			->where('tt.model_id = ' . $this->model_id)
			->orderBy('tt.ord DESC')
			->all();
    }

	public function getTags()
    {
		$this->hasMany(Tags::className(), ['id' => 'tag_id']);
	}
}
