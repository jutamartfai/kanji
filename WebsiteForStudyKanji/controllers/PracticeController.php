<?php

namespace app\controllers;

use Yii;
use app\models\Practice;
use app\models\PracticeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PracticeController implements the CRUD actions for Practice model.
 */
class PracticeController extends Controller
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
     * Lists all Practice models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'template';

        $searchModel = new PracticeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model_practice = practice::find()->groupBy(['practice_ch'])->all();
        $model_ch1 = practice::find()->where("practice_ch = '01'")->all();
        $model_ch2 = practice::find()->where("practice_ch = '02'")->all();
        $model_ch3 = practice::find()->where("practice_ch = '03'")->all();
        $model_ch4 = practice::find()->where("practice_ch = '04'")->all();
        $model_ch5 = practice::find()->where("practice_ch = '05'")->all();
        $model_ch6 = practice::find()->where("practice_ch = '06'")->all();
        $model_ch7 = practice::find()->where("practice_ch = '07'")->all();
        $model_ch8 = practice::find()->where("practice_ch = '08'")->all();
        $model_ch9 = practice::find()->where("practice_ch = '09'")->all();
        $model_ch10 = practice::find()->where("practice_ch = '10'")->all();
        $model_ch11 = practice::find()->where("practice_ch = '11'")->all();
        $model_ch12 = practice::find()->where("practice_ch = '12'")->all();
        $model_ch13 = practice::find()->where("practice_ch = '13'")->all();
        $model_ch14 = practice::find()->where("practice_ch = '14'")->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model_practice' => $model_practice,
            'model_ch1' => $model_ch1,
            'model_ch2' => $model_ch2,
            'model_ch3' => $model_ch3,
            'model_ch4' => $model_ch4,
            'model_ch5' => $model_ch5,
            'model_ch6' => $model_ch6,
            'model_ch7' => $model_ch7,
            'model_ch8' => $model_ch8,
            'model_ch9' => $model_ch9,
            'model_ch10' => $model_ch10,
            'model_ch11' => $model_ch11,
            'model_ch12' => $model_ch12,
            'model_ch13' => $model_ch13,
            'model_ch14' => $model_ch14,
        ]);
    }

    /**
     * Displays a single Practice model.
     * @param string $practice_ch
     * @param string $practice_no
     * @return mixed
     */
    public function actionView($practice_ch, $practice_no)
    {
        $this->layout = 'template';

        return $this->render('view', [
            'model' => $this->findModel($practice_ch, $practice_no),
        ]);
    }

    /**
     * Creates a new Practice model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($chapter)
    {
        $this->layout = 'template';

        $model = new Practice();

        $ch_practice = practice::find()->where("practice_ch = $chapter")->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'practice_ch' => $model->practice_ch, 'practice_no' => $model->practice_no]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'ch_practice' => $ch_practice,
                'chapter'=>$chapter,
            ]);
        }
    }

    /**
     * Updates an existing Practice model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $practice_ch
     * @param string $practice_no
     * @return mixed
     */
    public function actionUpdate($practice_ch, $practice_no)
    {
        $this->layout = 'template';

        $model = $this->findModel($practice_ch, $practice_no);

        $ch_practice = practice::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'practice_ch' => $model->practice_ch, 'practice_no' => $model->practice_no]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'ch_practice' => $ch_practice,
            ]);
        }
    }

    /**
     * Deletes an existing Practice model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $practice_ch
     * @param string $practice_no
     * @return mixed
     */
    public function actionDelete($practice_ch, $practice_no)
    {
        $this->layout = 'template';

        $this->findModel($practice_ch, $practice_no)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Practice model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $practice_ch
     * @param string $practice_no
     * @return Practice the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($practice_ch, $practice_no)
    {
        $this->layout = 'template';

        if (($model = Practice::findOne(['practice_ch' => $practice_ch, 'practice_no' => $practice_no])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
