<?php

namespace app\models\plants;

use Yii;

/**
 * This is the model class for table "plants_pictures".
 *
 * @property integer $id
 * @property integer $plantid
 * @property string $name
 */
class Pictures extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plants_pictures';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[['plantid', 'name'], 'required'],
			[['plantid'], 'integer'],
			[['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plantid' => 'расстение',
            'name' => 'картинка',
        ];
    }
    
    public function afterDelete()
    {
        $filename = Yii::getAlias('@webroot') . '/images/' . $this->name;
        if (file_exists($filename)) unlink($filename);
        $filename = Yii::getAlias('@webroot') . '/images/thumbs/' . $this->name;
        if (file_exists($filename)) unlink($filename);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMainimage()
    {
        return $this->hasOne(Plants::className(), ['pictureid' => 'id']);
    }
}
