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

use app\models\Member;
use app\models\Bookmarktransaction;
use app\models\Practicetransaction;

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
     * manage action.
     *
     * @return string
     */
    public function actionManage()
    {
        $this->layout = 'template';
        $session = new Session;
        $session->open();

        $model_mem = Member::find()->all();
        $model_PracTran = Practicetransaction::find()->all();
        $model_bookmark = Bookmarktransaction::find()->all();

        foreach ($model_mem as $key => $member) {
            $date = date("Y-m-d H:i:s");
            if($date >= $member->expired_date)
            {
                foreach ($model_bookmark as $key => $bookmark) {
                    if($member->email==$bookmark->email)
                    {
                        $model_bookmark = Bookmarktransaction::findOne($bookmark->id);
                        $model_bookmark->delete();
                    }
                }
                foreach ($model_PracTran as $key => $PracTran) {
                    if($member->email==$PracTran->email)
                    {
                        $model_PracTran = Practicetransaction::findOne($PracTran->id);
                        $model_PracTran->delete();
                    }
                }
                $model_mem = Member::findOne($member->email);
                $model_mem->delete();
            }
        }

        foreach ($model_PracTran as $key => $pracTran) {
            $date = date("Y-m-d H:i:s");
            if($date >= $pracTran->expired_date)
            {
                $model_PracTran = Practicetransaction::findOne($pracTran->id);
                $model_PracTran->delete();
            }
        }

        //return $this->render('manage');
        return $this->render('manage', [
            'login_alert' => '0',
        ]);
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
            return $this->render('manage', [
                'login_alert' => '0',
            ]);
        }

        $model = new AdminLoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $session['admin_name'] = $model->getUName();
            return $this->render('manage', [
                'login_alert' => '1',
            ]);
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

        return $this->render('manage', [
            'login_alert' => '2',
        ]);
    }


    /**
     * Lists all Admin models.
     * @return mixed
     */
    public function actionManage_admin()
    {
        $this->layout = 'template';
        $session = new Session;
        $session->open();

        if (!isset($session['admin_name'])) {
            return $this->render('manage', [
                'login_alert' => '0',
            ]);
        }

        $searchModel = new AdminSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model = Admin::find()->orderBy(['username' => SORT_ASC])->all();

        return $this->render('manage_admin', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            'admin_alert' => '0',
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

        if (!isset($session['admin_name'])) {
            return $this->render('manage', [
                'login_alert' => '0',
            ]);
        }

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

        if (!isset($session['admin_name'])) {
            return $this->render('manage', [
                'login_alert' => '0',
            ]);
        }

        $model = new Admin();

        if ($model->load(Yii::$app->request->post())) {
            $model->password = md5($model->password);
            $model->save();

            $model = Admin::find()->all();

            return $this->render('manage_admin', [
                'model' => $model,
                'admin_alert' => '2',
            ]);
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

        if (!isset($session['admin_name'])) {
            return $this->render('manage', [
                'login_alert' => '0',
            ]);
        }

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
     * Deletes an existing Kanji model.
     * If deletion is successful, the browser will be redirected to the 'manage_admin' page.
     * @param string $kanji_ch
     * @param string $kanji_no
     * @return mixed
     */
    public function actionDeletes($id)
    {
        $this->layout = 'template';
        $session = new Session;
        $session->open();

        if (!isset($session['admin_name'])) {
            //return $this->render('../admin/manage');
            return $this->render('../admin/manage', [
                'login_alert' => '0',
            ]);
        }

        $model = Admin::find()->all();
        foreach ($model as $key => $value) {
            if($id==$value->username)
            {
                $model = $this->findModel($id);

                $model->delete();
            }
        }

        $model = Admin::find()->all();

        return $this->render('manage_admin', [
            'model' => $model,
            'admin_alert' => '1',
        ]);
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
