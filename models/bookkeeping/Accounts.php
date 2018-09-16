<?php

namespace app\models\bookkeeping;

use Yii;

/**
 * This is the model class for table "bookkeeping_accounts".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 */
class Accounts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bookkeeping_accounts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 30],
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
            'description' => 'описание',
        ];
    }
}
