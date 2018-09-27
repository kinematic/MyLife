<?php
namespace app\models;
 
use yii\base\Model;
use yii\web\UploadedFile;
use Yii;
use app\models\plants\Pictures;
use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;
 
class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;
	public $modelID;
	public $mainImg;
 
    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4,'checkExtensionByMimeType'=>false],
        ];
    }
     
    public function upload()
    {
        if ($this->validate()) { 
            foreach ($this->imageFiles as $file) {
// 					print_r($file);
// 					die();
					$photo = Image::getImagine()->open($file->tempName);
                    $dir = Yii::getAlias('images/');
                    $fileName = Yii::$app->getSecurity()->generateRandomString(15) . '.' . $file->extension;
					$photo->thumbnail(new Box(800, 480))->save($dir . $fileName, ['quality' => 90]);
					Image::thumbnail($dir . $fileName, 150, 90)
                    ->save(Yii::getAlias($dir .'thumbs/'. $fileName), ['quality' => 80]);
					$picture = new Pictures();
                    $picture->plantid = $this->modelID;
                    $picture->name = $fileName;
                    $picture->save();
                    $countPictures = Pictures::find()->where(['plantid' => $this->modelID])->count();
                    if($countPictures == 1) $this->mainImg = $picture->id;
            }
            return true;
        } else {
            return false;
        }
    }
}
