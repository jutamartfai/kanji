<?php

namespace app\controllers;

use Yii;
use app\models\Kanji;
use app\models\Chapter;
use app\models\KanjiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\web\Session;


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
    public function actionManage_kanji()
    {
        $this->layout = 'template';
        $session = new Session;
        $session->open();

        if (!isset($session['admin_name'])) {
            return $this->render('../admin/manage', [
                'login_alert' => '0',
            ]);
        }

        $searchModel = new KanjiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model = Kanji::find()->all();
        $model_ch = Chapter::find()->all();

        return $this->render('manage_kanji', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            'model_ch' => $model_ch,
            'kanji_alert' => '0',
        ]);
    }

    /**
     * Displays a single Kanji model.
     * @param string $kanji_ch
     * @param string $kanji_no
     * @return mixed
     */
    public function actionView($kanji_ch, $kanji_no,$kanji_alert)
    {
        $this->layout = 'template';
        $session = new Session;
        $session->open();

        if (!isset($session['admin_name'])) {
            return $this->render('../admin/manage', [
                'login_alert' => '0',
            ]);
        }

        return $this->render('view', [
            'model' => $this->findModel($kanji_ch, $kanji_no),
            'kanji_alert' => '0',
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
        $session = new Session;
        $session->open();

        if (!isset($session['admin_name'])) {
            return $this->render('../admin/manage', [
                'login_alert' => '0',
            ]);
        }

        $model = new Kanji();

        $ch_kanji = kanji::find()->where("kanji_ch = $chapter")->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->render('view', [
                'kanji_ch' => $model->kanji_ch,
                'kanji_no' => $model->kanji_no,
                'kanji_alert' => '2',
                'model' => $model,
            ]);
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
        $session = new Session;
        $session->open();

        if (!isset($session['admin_name'])) {
            return $this->render('../admin/manage', [
                'login_alert' => '0',
            ]);
        }

        $model = $this->findModel($kanji_ch, $kanji_no);

        $ch_kanji = kanji::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->render('view', [
                'kanji_ch' => $model->kanji_ch,
                'kanji_no' => $model->kanji_no,
                'kanji_alert' => '3',
                'model' => $model,
            ]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'ch_kanji'=>$ch_kanji,
            ]);
        }
    }

    /**
     * Deletes an existing Kanji model.
     * If deletion is successful, the browser will be redirected to the 'manage_kanji' page.
     * @param string $kanji_ch
     * @param string $kanji_no
     * @return mixed
     */
    public function actionDeletes($kanji_ch, $kanji_no)
    {
        $this->layout = 'template';
        $session = new Session;
        $session->open();

        if (!isset($session['admin_name'])) {
            return $this->render('../admin/manage', [
                'login_alert' => '0',
            ]);
        }

        $model = Kanji::find()->all();
        foreach ($model as $key => $value) {
            if(($kanji_ch==$value->kanji_ch)&&($kanji_no==$value->kanji_no))
            {
                $model = $this->findModel($kanji_ch, $kanji_no);

                $model->delete();
            }
        }

        // $this->findModel($kanji_ch, $kanji_no)->delete();

        $model = Kanji::find()->all();
        $model_ch = Chapter::find()->all();

        return $this->render('manage_kanji', [
            'model' => $model,
            'model_ch' => $model_ch,
            'kanji_alert' => '1',
        ]);
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
        //$this->layout = 'template';

        if (($model = Kanji::findOne(['kanji_ch' => $kanji_ch, 'kanji_no' => $kanji_no])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
