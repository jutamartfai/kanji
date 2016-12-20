<?php

namespace app\controllers;

use Yii;
use app\models\Kanji;
use app\models\KanjiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KanjiController implements the CRUD actions for Kanji model.
 */
class KanjiController extends Controller
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
     * Lists all Kanji models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KanjiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kanji model.
     * @param string $kanji_ch
     * @param string $kanji_no
     * @return mixed
     */
    public function actionView($kanji_ch, $kanji_no)
    {
        return $this->render('view', [
            'model' => $this->findModel($kanji_ch, $kanji_no),
        ]);
    }

    /**
     * Creates a new Kanji model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Kanji();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kanji_ch' => $model->kanji_ch, 'kanji_no' => $model->kanji_no]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Kanji model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $kanji_ch
     * @param string $kanji_no
     * @return mixed
     */
    public function actionUpdate($kanji_ch, $kanji_no)
    {
        $model = $this->findModel($kanji_ch, $kanji_no);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kanji_ch' => $model->kanji_ch, 'kanji_no' => $model->kanji_no]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Kanji model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $kanji_ch
     * @param string $kanji_no
     * @return mixed
     */
    public function actionDelete($kanji_ch, $kanji_no)
    {
        $this->findModel($kanji_ch, $kanji_no)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Kanji model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $kanji_ch
     * @param string $kanji_no
     * @return Kanji the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($kanji_ch, $kanji_no)
    {
        if (($model = Kanji::findOne(['kanji_ch' => $kanji_ch, 'kanji_no' => $kanji_no])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
