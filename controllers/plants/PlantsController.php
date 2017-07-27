<?php

namespace app\controllers\plants;

use Yii;
use app\models\plants\Plants;
use app\models\plants\PlantsSearch;
use app\models\plants\Pictures;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;

/**
 * PlantsController implements the CRUD actions for Plants model.
 */
class PlantsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Plants models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PlantsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Plants model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $pictures = Pictures::find()->select('name')->where(['plantid' => $id])->orderBy('main DESC')->all();
//         $pictures = Pi
        return $this->render('view', [
            'model' => $this->findModel($id),
            'pictures' => $pictures,
        ]);
    }

    /**
     * Creates a new Plants model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Plants();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->addPicture($model);
            return $this->redirect(['view', 'id' => $model->id]);

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Plants model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
//         print_r($_POST);
//         die();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//                 print_r($model);
//         die();
            Yii::warning('id картинки' . $model->mainImg);
//             Yii::warning('главная картинкаs: ' . $model->mainImg, false);
            //добавление картинок
            $this->addPicture($model);
            
            //назначение главной картинки
            if(isset($model->mainImg)) {
                Pictures::updateAll(['main' => null], 'plantid = ' . $id);
                $picture = Pictures::findOne($model->mainImg);
                $picture->main = true;
                $picture->save();
            }
            
            //удаление картинок
            if(isset($model->delImg)) {
                foreach($model->delImg as $item) {
                    Pictures::findOne($item)->delete();
                }
            }
            

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Plants model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        $pictures = Pictures::find()->where(['plantid' => $id])->all();
        foreach($pictures as $picture) {
            $picture->delete();
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Plants model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Plants the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Plants::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

	public function createDirectory($path) {  
	    //$filename = "/folder/{$dirname}/";  
	    if (file_exists($path)) {  
	        //echo "The directory {$path} exists";  
	    } else {  
	        mkdir($path, 0775, true);  
	        //echo "The directory {$path} was successfully created.";  
	    }
	}
	
	public function addPicture($model) {
            $file = UploadedFile::getInstance($model, 'file');
// 			Yii::warning('картинка: ' . print_r($file, true));
// 			Yii::warning('картинка: ' . date('Y-m-d H:i:s.', filectime($file->tempName)));
// Yii::warning('картинка: ' . exif_read_data('/var/www/localhost/htdocs/aiv/tmp/image.jpg'));
            if ($file && $file->tempName) {
                $model->file = $file;
                if ($model->validate(['file'])) {
                    $dir = Yii::getAlias('images/');
                    $fileName = $model->file->baseName . '.' . $model->file->extension;
                    $model->file->saveAs($dir . $fileName);
                    $model->file = $fileName; // без этого ошибка

                    $picture = new Pictures();

                    $picture->plantid = $model->id;
//                     $picture->name = '/' . $dir . $fileName;
                    $picture->name = $fileName;
                    
                    $countPictures = Pictures::find()->where(['plantid' => $model->id])->count();
                    Yii::warning('количество картинок: ' . $countPictures);
                    if(!$countPictures) $picture->main = 1;
// 					$filedate = date('Y-m-d H:i:s.', filectime($dir . $fileName));
// 					Yii::warning('время файла: ' . $filedate);
// 					$picture->date = $filedate;
                    $picture->save();

					// Для ресайза фотки до 800x800px по большей стороне надо обращаться к функции Box() или widen, так как в обертках доступны только 5 простых функций: crop, frame, getImagine, setImagine, text, thumbnail, watermark
                    $photo = Image::getImagine()->open($dir . $fileName);
                    $photo->thumbnail(new Box(800, 480))->save($dir . $fileName, ['quality' => 90]);

                    
                    //$imagineObj = new Imagine();
                    //$imageObj = $imagineObj->open(\Yii::$app->basePath . $dir . $fileName);
                    //$imageObj->resize($imageObj->getSize()->widen(400))->save(\Yii::$app->basePath . $dir . $fileName);
                    
                    Yii::$app->controller->createDirectory(Yii::getAlias('images/thumbs')); 
//                     Image::thumbnail($dir . $fileName, 150, 112)
//                     ->save(Yii::getAlias($dir .'thumbs/'. $fileName), ['quality' => 80]);
					Image::thumbnail($dir . $fileName, 150, 90)
                    ->save(Yii::getAlias($dir .'thumbs/'. $fileName), ['quality' => 80]);
                }
            }
        }
}
