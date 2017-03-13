<?php

namespace app\controllers;

use Yii;
use app\models\Admin;
use app\models\AdminSearch;
use app\models\AdminLoginForm;
use yii\web\session;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdminController implements the CRUD actions for Admin model.
 */
class AdminController extends Controller
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
     * wellcome action.
     *
     * @return string
     */
    public function actionWellcome()
    {
        $this->layout = 'template';
        $session = new Session;
        $session->open();

        return $this->render('wellcome');
    }
    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'template';
        $session = new Session;
        $session->open();

        if (isset($session['admin_name'])) {
            return $this->render('wellcome');
        }

        $model = new AdminLoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $session['admin_name'] = $model->getUName();
            return $this->render('wellcome');
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
    // public function actionLogout()
    // {
    //     Yii::$app->user->logout();

    //     return $this->goHome();
    // }

    public function actionGologout()
    {
        $this->layout = 'template';
        $session = new Session;
        $session->open();

        unset($session['admin_name']);
        $session->close();

        return $this->render('wellcome');
    }


    /**
     * Lists all Admin models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'template';
        $session = new Session;
        $session->open();

        $searchModel = new AdminSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Admin model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout = 'template';
        $session = new Session;
        $session->open();

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Admin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'template';
        $session = new Session;
        $session->open();

        $model = new Admin();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->username]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Admin model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout = 'template';
        $session = new Session;
        $session->open();

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->username]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Admin model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->layout = 'template';
        $session = new Session;
        $session->open();

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Admin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Admin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $this->layout = 'template';

        if (($model = Admin::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
