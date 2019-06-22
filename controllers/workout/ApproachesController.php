<?php

namespace app\controllers\workout;

use Yii;
use app\models\workout\Approaches;
use app\models\workout\ApproachesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * ApproachesController implements the CRUD actions for Approaches model.
 */
class ApproachesController extends Controller
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
     * Lists all Approaches models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ApproachesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Approaches model.
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
     * Creates a new Approaches model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Approaches();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

		$dataProvider = new ActiveDataProvider([
		    'query' => Approaches::find()
                ->innerJoin('workout_exercises we', 'workout_approaches.exerciseid = we.id')
                ->where('workout_approaches.id IN (SELECT max(wa.id) FROM workout_approaches wa group by exerciseid)')
                ->orderBy('we.name'),
		    'pagination' => [
		        'pageSize' => 20,
		    ],
		]);

		$model->date = date('Y-m-d');
		$model->placeid = 4;
		$model->exerciseid = 2;
		$model->approach1 = 7;
		$model->approach2 = 7;
		$model->approach3 = 7;
		$model->approach4 = 7;
		$model->approach5 = 7;

        return $this->render('create', [
            'model' => $model,
			'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Updates an existing Approaches model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Approaches model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Approaches model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Approaches the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Approaches::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
