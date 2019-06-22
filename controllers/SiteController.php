<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\UploadForm;
use yii\web\UploadedFile;
use app\models\workout\Bodysizes;
use app\models\workout\Runing;
use yii\db\Query;
use yii\data\ActiveDataProvider;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

	public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
    }
    
    public function actionReport()
    {
		$startdate = date("Y-m-d", strtotime('monday this week'));
		$enddate = date("Y-m-d", strtotime('sunday this week'));

        $weight = Bodysizes::find()
            ->select("AVG(value) value")
            ->where("partid = 1 AND date BETWEEN '{$startdate}' AND '{$enddate}'")
            ->one();  
// print_r($weight);
// die();

// 			$weight = new Query;
// 			$weight->select('sum(id) name, AVG(value) approaches')
// 		    ->from('workout_bodysizes wa')
// 			->where('partid = 1 AND date BETWEEN DATE_SUB(CURRENT_DATE, Interval 1 WEEK) AND CURRENT_DATE()');

        $runing = Runing::find()
            ->select('SUM(duration) duration')
            ->where("date BETWEEN '{$startdate}' AND '{$enddate}'")
            ->one();
// print_r($runing);
// die();
		$query = new Query;
		$query->select('we.name name, SUM(approaches) approaches')
		    ->from('workout_approaches_view wa')
			->innerJoin('workout_exercises we', 'wa.exerciseid = we.id')
			->where("date BETWEEN '{$startdate}' AND '{$enddate}'")
			->groupBy('we.name');
// $approaches =

// 		$query->union($weight);
		$dataProvider = new ActiveDataProvider([
		    'query' => $query,
		    'pagination' => [
		        'pageSize' => 10,
		    ],
		]);

        return $this->render(
            'report', 
            [
                'weight' => $weight,
				'dataProvider' => $dataProvider,
				'runing' => $runing
            ]
        );
    }
}
