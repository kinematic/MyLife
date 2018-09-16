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
}
