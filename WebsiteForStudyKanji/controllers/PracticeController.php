<?php

namespace app\controllers;

use Yii;
use app\models\Practice;
use app\models\Chapter;
use app\models\PracticeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\UploadForm;
use yii\web\UploadedFile;

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

        $model = Practice::find()->all();
        $model_ch = Chapter::find()->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            'model_ch' => $model_ch,
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

        $model_upload = new UploadForm();

        // if (Yii::$app->request->isPost) {
        //     $model->load(Yii::$app->request->post());
        //     if ($model->save()) {
        //         if (!isset($model_upload->file)) {
        //             // file --> question image
        //             $model_upload->file = UploadedFile::getInstance($model_upload, 'file');
        //             if ($model_upload->validate()) {
        //                 $model_upload->file->saveAs('uploads/'. "Q" . $model->practice_ch . $model->practice_no . '.' . $model_upload->file->extension);
        //                 $model->question = "Q" . $model->practice_ch . $model->practice_no . '.' . $model_upload->file->extension;
        //             }

        //             // file --> meaning image
        //             $model_upload->file = UploadedFile::getInstance($model_upload, 'file2');
        //             if ($model_upload->validate()) {
        //                 $model_upload->file->saveAs('uploads/'. "M" . $model->practice_ch . $model->practice_no . '.' . $model_upload->file->extension);
        //                 $model->meaning = "M" . $model->practice_ch . $model->practice_no . '.' . $model_upload->file->extension;
        //             }

        //             // file --> pron image
        //             $model_upload->file = UploadedFile::getInstance($model_upload, 'file3');
        //             if ($model_upload->validate()) {
        //                 $model_upload->file->saveAs('uploads/'."P" . $model->practice_ch . $model->practice_no . '.' . $model_upload->file->extension);
        //                 $model->pron = "P" . $model->practice_ch . $model->practice_no . '.' . $model_upload->file->extension;
        //             }
        //         }
        //         $model->save();
        //     }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->question = $model->upload($model,'question');
            $model->meaning = $model->upload($model,'meaning');
            $model->pron = $model->upload($model,'pron');
            $model->save();

            return $this->redirect(['view', 'practice_ch' => $model->practice_ch, 'practice_no' => $model->practice_no]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'ch_practice' => $ch_practice,
                'chapter'=>$chapter,
                'model_upload' => $model_upload,
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

        $model = Practice::findOne(['practice_ch' => $practice_ch, 'practice_no' => $practice_no]);

        $ch_practice = practice::find()->all();

        $model_upload = new UploadForm();

        /* if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            if ($model->save()) {
                $model_upload->file = UploadedFile::getInstance($model_upload, 'file');
                if ($model_upload->validate()) {
                    $model_upload->file->saveAs('uploads/' . "Q" .$model_upload->file->baseName. '.' . $model_upload->file->extension);
                    $model->question = "Q" .$model_upload->file->baseName . '.' . $model_upload->file->extension;
                }

                $model_upload->file2 = UploadedFile::getInstance($model_upload, 'file2');
                if ($model_upload->validate()) {
                    $model_upload->file2->saveAs('uploads/' . "M" .$model_upload->file->baseName. '.' . $model_upload->file2->extension);
                    $model->meaning = "M" .$model_upload->file2->baseName . '.' . $model_upload->file2->extension;
                }


                $model_upload->file3 = UploadedFile::getInstance($model_upload, 'file3');
                if ($model_upload->validate()) {
                    $model_upload->file3->saveAs('uploads/' . "P" .$model_upload->file->baseName. '.' . $model_upload->file3->extension);
                    $model->pron = "P" .$model_upload->file3->baseName . '.' . $model_upload->file3->extension;
                }
                $model->save();
                return $this->redirect(['index']);
                //return $this->redirect(['view', 'practice_ch' => $model->practice_ch, 'practice_no' => $model->practice_no]);
            }
        } */

        // if (Yii::$app->request->isPost) {
        //     $model->load(Yii::$app->request->post());
        //     $model_upload->file = "";
        //     echo "img = ".$model_upload->file;
        //     if ($model->save()) {
        //         if ($model_upload->file != "") {
        //             $model_upload->file = UploadedFile::getInstance($model_upload, 'file');
        //             if ($model_upload->validate()) {
        //                 $model_upload->file->saveAs('uploads/'.$model_upload->file->baseName. '.' . $model_upload->file->extension);
        //                 $model->question = $model_upload->file->baseName . '.' . $model_upload->file->extension;
        //             }
        //             echo "ok";
        //         }
        //         else{
        //             echo "<br>no";
        //         }
        //         $model->save();
        //     }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->question = $model->upload($model,'question');
            $model->meaning = $model->upload($model,'meaning');
            $model->pron = $model->upload($model,'pron');
            $model->save();

            return $this->redirect(['view', 'practice_ch' => $model->practice_ch, 'practice_no' => $model->practice_no]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'ch_practice' => $ch_practice,
                'model_upload' => $model_upload,
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
        //$this->layout = 'template';

        if (($model = Practice::findOne(['practice_ch' => $practice_ch, 'practice_no' => $practice_no])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
