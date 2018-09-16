<?php

namespace app\models\tracing;

use Yii;

/**
 * This is the model class for table "tracing_tracing".
 *
 * @property int $id
 * @property int $groupid
 * @property int $tagid
 */
class Tracing extends \yii\db\ActiveRecord
{
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
            [['group_id', 'tag_id'], 'required'],
            [['group_id', 'tag_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'trace_id' => 'ID',
            'group_id' => 'Groupid',
            'tag_id' => 'Tagid',
        ];
    }
}
