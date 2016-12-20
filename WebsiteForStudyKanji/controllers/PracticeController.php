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
        $searchModel = new PracticeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
        return $this->render('view', [
            'model' => $this->findModel($practice_ch, $practice_no),
        ]);
    }

    /**
     * Creates a new Practice model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Practice();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'practice_ch' => $model->practice_ch, 'practice_no' => $model->practice_no]);
        } else {
            return $this->render('create', [
                'model' => $model,
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
        $model = $this->findModel($practice_ch, $practice_no);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'practice_ch' => $model->practice_ch, 'practice_no' => $model->practice_no]);
        } else {
            return $this->render('update', [
                'model' => $model,
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
        if (($model = Practice::findOne(['practice_ch' => $practice_ch, 'practice_no' => $practice_no])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
