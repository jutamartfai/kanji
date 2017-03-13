<?php

namespace app\controllers;

use Yii;
use app\models\Member;
use app\models\MemberSearch;
use app\models\LoginForm;
use yii\web\session;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MemberController implements the CRUD actions for Member model.
 */
class MemberController extends Controller
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
     * Lists all Member models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'template';
        $session = new Session;
        $session->open();

        $searchModel = new MemberSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Member model.
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
     * Creates a new Member model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'template';
        $session = new Session;
        $session->open();

        $model = new Member();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->email]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Member model.
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
            return $this->redirect(['view', 'id' => $model->email]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Member model.
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
     * Finds the Member model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Member the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        // $this->layout = 'template';

        if (($model = Member::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'maintemp';
        $session = new Session;
        $session->open();

        if (isset($session['member_name'])) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $session['member_name'] = $model->getName();
            return $this->goHome();
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
        $this->layout = 'maintemp';
        $session = new Session;
        $session->open();

        unset($session['member_name']);
        $session->close();

        return $this->goHome();
    }

    /**
     * Profile action.
     */
    public function actionProfile($id)
    {
        $this->layout = 'maintemp';
        $session = new Session;
        $session->open();

        return $this->render('Profile', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Updates an existing Member Profile.
     * If update is successful, the browser will be redirected to the 'Profile' page.
     * @param string $id
     * @return mixed
     */
    public function actionEdit_profile($id)
    {
        $this->layout = 'maintemp';
        $session = new Session;
        $session->open();

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['Profile', 'id' => $model->email]);
        } else {
            return $this->render('edit_profile', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Register action.
     */
    public function actionRegister()
    {
        $this->layout = 'maintemp';
        $session = new Session;
        $session->open();

        if (isset($session['member_name'])) {
            return $this->goHome();
        }

        $model = new Member();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['Profile', 'id' => $model->email]);
        } else {
            return $this->render('register', [
                'model' => $model,
            ]);
        }
    }
}
