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
        $this->layout = 'template';

        $searchModel = new KanjiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model_kanji = kanji::find()->groupBy(['kanji_ch'])->all();
        $model_ch1 = kanji::find()->where("kanji_ch = '01'")->all();
        $model_ch2 = kanji::find()->where("kanji_ch = '02'")->all();
        $model_ch3 = kanji::find()->where("kanji_ch = '03'")->all();
        $model_ch4 = kanji::find()->where("kanji_ch = '04'")->all();
        $model_ch5 = kanji::find()->where("kanji_ch = '05'")->all();
        $model_ch6 = kanji::find()->where("kanji_ch = '06'")->all();
        $model_ch7 = kanji::find()->where("kanji_ch = '07'")->all();
        $model_ch8 = kanji::find()->where("kanji_ch = '08'")->all();
        $model_ch9 = kanji::find()->where("kanji_ch = '09'")->all();
        $model_ch10 = kanji::find()->where("kanji_ch = '10'")->all();
        $model_ch11 = kanji::find()->where("kanji_ch = '11'")->all();
        $model_ch12 = kanji::find()->where("kanji_ch = '12'")->all();
        $model_ch13 = kanji::find()->where("kanji_ch = '13'")->all();
        $model_ch14 = kanji::find()->where("kanji_ch = '14'")->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model_kanji' => $model_kanji,
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
     * Displays a single Kanji model.
     * @param string $kanji_ch
     * @param string $kanji_no
     * @return mixed
     */
    public function actionView($kanji_ch, $kanji_no)
    {
        $this->layout = 'template';

        return $this->render('view', [
            'model' => $this->findModel($kanji_ch, $kanji_no),
        ]);
    }

    /**
     * Creates a new Kanji model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($chapter)
    {
        $this->layout = 'template';

        $model = new Kanji();

        $ch_kanji = kanji::find()->where("kanji_ch = $chapter")->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kanji_ch' => $model->kanji_ch, 'kanji_no' => $model->kanji_no]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'ch_kanji'=>$ch_kanji,
                'chapter'=>$chapter,
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
        $this->layout = 'template';

        $model = $this->findModel($kanji_ch, $kanji_no);

        $ch_kanji = kanji::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kanji_ch' => $model->kanji_ch, 'kanji_no' => $model->kanji_no]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'ch_kanji'=>$ch_kanji,
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
        $this->layout = 'template';

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
        $this->layout = 'template';

        if (($model = Kanji::findOne(['kanji_ch' => $kanji_ch, 'kanji_no' => $kanji_no])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
