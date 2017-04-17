<?php

namespace app\controllers;

use Yii;
use app\models\Member;
use app\models\MemberSearch;
use app\models\Admin;
use app\models\LoginForm;
use app\models\Chapter;
use app\models\Practicetransaction;
use app\models\Bookmarktransaction;
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

        if (!isset($session['admin_name'])) {
            return $this->render('../admin/wellcome');
        }

        $searchModel = new MemberSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model = Member::find()->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            'mem_alert' => '0',
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

        if (!isset($session['admin_name'])) {
            return $this->render('../admin/wellcome');
        }

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

        if (!isset($session['admin_name'])) {
            return $this->render('../admin/wellcome');
        }

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

        if (!isset($session['admin_name'])) {
            return $this->render('../admin/wellcome');
        }

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
    public function actionDeletebyadmin($id)
    {
        $this->layout = 'template';
        $session = new Session;
        $session->open();

        if (!isset($session['admin_name'])) {
            return $this->render('../admin/wellcome');
        }

        $model_mem = Member::find()->all();
        $model_PracTran = Practicetransaction::find()->all();
        $model_bookmark = Bookmarktransaction::find()->all();

        foreach ($model_mem as $key => $member) {
            if(($id==$member->email))
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

                $model = $this->findModel($id);
                $model->delete();
            }
        }

        return $this->render('index', [
            'mem_alert' => '1',
            'model' => $model_mem,
        ]);
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
            $member = Member::findone($model->getEmail());
            $member->active_date = date("Y-m-d H:i:s");
            $member->expired_date = date('Y-m-d H:i:s', strtotime('+1 years'));
            $member->save();
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

        if (!isset($session['member_name'])) {
            $model = new LoginForm();
            return $this->render('login', [
                'model' => $model,
            ]);
        }

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

        if (!isset($session['member_name'])) {
            $model = new LoginForm();
            return $this->render('login', [
                'model' => $model,
            ]);
        }

        $email = $session['member_name'];

        $pracTran = Practicetransaction::find()->where("email='$email'")->orderBy(['do_date'=>SORT_DESC])->all();
        $bookmarkTran = Bookmarktransaction::find()->where("email='$email'")->orderBy(['view_date'=>SORT_DESC])->all();

        $model_ch = Chapter::find()->all();

        return $this->render('Profile', [
            'model' => $this->findModel($id),
            'pracTran' => $pracTran,
            'bookmarkTran' => $bookmarkTran,
            'model_ch' => $model_ch,
            'profile_alert' => '0',
        ]);
    }

    public function actionDeletes($id,$no)
    {
        $this->layout = 'maintemp';
        $session = new Session;
        $session->open();

        if (!isset($session['member_name'])) {
            $model = new LoginForm();
            return $this->render('login', [
                'model' => $model,
            ]);
        }

        $model_PracTran = Practicetransaction::find()->all();
        foreach ($model_PracTran as $key => $value) {
            if($no==$value->id)
            {
                $model_PracTran = Practicetransaction::findOne($no);
                $model_PracTran->delete();
            }
        }

        $email = $session['member_name'];
        $pracTran = Practicetransaction::find()->where("email='$email'")->all();
        $bookmarkTran = Bookmarktransaction::find()->where("email='$email'")->all();

        $model_ch = Chapter::find()->all();

        return $this->render('Profile', [
            'model' => $this->findModel($id),
            'id' => $id,
            'pracTran' => $pracTran,
            'bookmarkTran' => $bookmarkTran,
            'model_ch' => $model_ch,
            'profile_alert' => '2',
        ]);

        // return $this->refresh();
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

        if (!isset($session['member_name'])) {
            $model = new LoginForm();
            return $this->render('login', [
                'model' => $model,
            ]);
        }

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $email = $session['member_name'];

            $pracTran = Practicetransaction::find()->where("email='$email'")->orderBy(['do_date'=>SORT_DESC])->all();
            $bookmarkTran = Bookmarktransaction::find()->where("email='$email'")->orderBy(['view_date'=>SORT_DESC])->all();

            $model_ch = Chapter::find()->all();

            return $this->render('Profile', [
                'model' => $this->findModel($id),
                'pracTran' => $pracTran,
                'bookmarkTran' => $bookmarkTran,
                'model_ch' => $model_ch,
                'profile_alert' => '1',
            ]);
        } else {
            return $this->render('edit_profile', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Password action.
     */
    public function actionPassword()
    {
        $this->layout = 'maintemp';
        $session = new Session();
        $session->open();

        if (!isset($session['member_name'])) {
            $model = new LoginForm();
            return $this->render('login', [
                'model' => $model,
            ]);
        }

        $model = Member::findone($session['member_name']);
        $current = new Admin();

        $currentPassword = $model->password;
        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            $current->load(Yii::$app->request->post());
            if(md5($current->password) == $currentPassword) {
                $model->password = md5($model->password);
                $model->save();

                $email = $session['member_name'];

                $pracTran = Practicetransaction::find()->where("email='$email'")->orderBy(['do_date'=>SORT_DESC])->all();
                $bookmarkTran = Bookmarktransaction::find()->where("email='$email'")->orderBy(['view_date'=>SORT_DESC])->all();

                $model_ch = Chapter::find()->all();

                return $this->render('Profile', [
                    'model' => $model,
                    'pracTran' => $pracTran,
                    'bookmarkTran' => $bookmarkTran,
                    'model_ch' => $model_ch,
                    'profile_alert' => '1',
                ]);
            }
        }
        return $this->render('password', ['model' => $model, 'current' => $current]);
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
        $session_model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $emailCh = $model->email;
            if (Member::find()->where("email='$emailCh'")->one()) {
                return $this->render('register', [
                    'email_check' => '1',
                    'model' => $model,
                ]);
            }
            else
            {
                $model->password = md5($model->password);
                $model->active_date = date("Y-m-d H:i:s");
                $model->expired_date = date('Y-m-d H:i:s', strtotime('+1 years'));
                $model->save();
                $session_model->username = $model->email;
                $session_model->password = $model->password;

                $session['member_name'] = $session_model->getName();
                return $this->goHome();
            }
        } else {
            return $this->render('register', [
                'email_check' => '0',
                'model' => $model,
            ]);
        }
    }
}
