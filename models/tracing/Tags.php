<?php

namespace app\models\tracing;
use sjaakp\taggable\TagBehavior;
use Yii;

/**
 * This is the model class for table "tracing_tags".
 *
 * @property int $id
 * @property string $name
 */
class Tags extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tracing_tags';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
            [['count'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'название',
            'count' => 'количество',
        ];
    }
    
    public function behaviors()
    {
        return [
            'tag' => [
                'class' => TagBehavior::className(),
                'junctionTable' => 'tracing_tracing',
                'linkRoute' => 'tracing/tags/view',
            ]
        ];
    }
    
    public function getGroups() {
        return $this->hasMany(Groups::className(), [ 'id' => 'model_id' ])
            ->viaTable('tracing_tracing', [ 'tag_id' => 'id' ]);
    }
}
