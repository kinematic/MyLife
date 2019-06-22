<?php

namespace app\controllers\tracing;

use Yii;
use app\models\tracing\Tracing;
use app\models\tracing\TracingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TracingController implements the CRUD actions for Tracing model.
 */
class TracingController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Tracing models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TracingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tracing model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tracing model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tracing();
        if ($model->load(Yii::$app->request->post())) {
			$ord = Tracing::find()->where(['model_id' => $model->model_id, 'ord' => $model->ord])->one();

			if(isset($ord->ord)) {

// print_r($ord);
// die();
				$connection = Yii::$app->db;
// 				$connection->createCommand()->update('tracing_tracing', ['ord' => 'ord + 1'], 'model_id = ' . $model->model_id . ' ord >= ' . $model->ord)->execute();
				$command = $connection->createCommand('UPDATE tracing_tracing SET ord = ord + 1 WHERE model_id = ' . $model->model_id . ' AND ord >= ' . $model->ord);
				$command->execute();
}
			$this->setValFromDirectory(
				$model, // 
				'Tags', // модель
				'tag_name', // атрибут поиска, string
				'tag_id'); // атрибут модели, int
            if($model->save()) return $this->redirect(['tracing/groups/view', 'id' => $model->model_id]);
        } else {
			$model->load(Yii::$app->request->get());
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tracing model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
			$this->setValFromDirectory(
				$model, // 
				'Tags', // модель
				'tag_name', // атрибут поиска, string
				'tag_id'); // атрибут модели, int
            if($model->save()) return $this->redirect(['tracing/groups/view', 'id' => $model->model_id]);
        } else {
			if(isset($model->tags->name)) $model->tags_name = $model->tags->name;
			return $this->render('update', [
	            'model' => $model,
	        ]);
		
		}

        
    }

    /**
     * Deletes an existing Tracing model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $groupid = $model->model_id;
        $model->delete();

        return $this->redirect(['tracing/groups/view', 'id' => $groupid]);
    }

    /**
     * Finds the Tracing model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tracing the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tracing::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

	private function setValFromDirectory($model, $directory, $string, $directoryid){
		if(isset($model->$string)){
			$directory = 'app\\models\\tracing\\' . $directory;
			$tmp = $directory::findOne(['name' => $model->$string]);
			if(!$tmp){
				$tmp2 = new $directory();
				$tmp2->name = $model->$string;
				$tmp2->save();
				$model->$directoryid = $tmp2->id;
				$model->save();
			} else {
				if($tmp->id <> $model->$directoryid) {
					$model->$directoryid = $tmp->id;
					$model->save();
				}
			}
		}
	}
}
