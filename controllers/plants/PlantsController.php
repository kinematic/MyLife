<?php

namespace app\controllers\plants;

use Yii;
use app\models\plants\Plants;
use app\models\plants\PlantsSearch;
use app\models\plants\Pictures;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
// use yii\imagine\Image;
// use Imagine\Gd;
// use Imagine\Image\Box;
// use Imagine\Image\BoxInterface;
use yii\web\UploadedFile;
use app\models\UploadForm;

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
        $pictures = Pictures::find()->select('plants_pictures.name')
		->joinWith('mainimage')
		->where(['plantid' => $id])
		->orderBy('pictureid DESC')
		->all();

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

			$uploads = new UploadForm();
			$uploads->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
			$uploads->modelID = $model->id;
			$uploads->upload();

			//назначение главной картинки
			if(isset($uploads->mainImg)) {
				$model->pictureid = $uploads->mainImg;
				$model->save();
			}

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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

			$uploads = new UploadForm();
			$uploads->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
			$uploads->modelID = $model->id;
			$uploads->upload();

			//назначение главной картинки
			if(isset($uploads->mainImg)) {
				$model->pictureid = $uploads->mainImg;
				$model->save();
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

}
