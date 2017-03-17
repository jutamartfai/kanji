<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\session;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Chapter;
use app\models\Kanji;
use app\models\Practice;
use app\models\Member;
use app\models\Bookmarktransaction;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'maintemp';
        $session = new Session;
        $session->open();

        $model_ch = Chapter::find()->all();

        // return $this->render('index', [
        //     'model_ch' => $model_ch,
        // ]);

        return $this->render('index', [
            'model_ch' => $model_ch,
        ]);
    }

    // /**
    //  * Login action.
    //  *
    //  * @return string
    //  */
    // public function actionLogin()
    // {
    //     $this->layout = 'maintemp';
    //     $session = new Session;
    //     $session->open();

    //     if (isset($session['member_name'])) {
    //         return $this->goHome();
    //     }

    //     $model = new LoginForm();
    //     if ($model->load(Yii::$app->request->post()) && $model->login()) {
    //         $session['member_name'] = $model->getName();
    //         return $this->goHome();
    //     }
    //     return $this->render('login', [
    //         'model' => $model,
    //     ]);
    // }

    // /**
    //  * Logout action.
    //  *
    //  * @return string
    //  */
    // public function actionLogout()
    // {
    //     Yii::$app->user->logout();

    //     return $this->goHome();
    // }

    // public function actionGologout()
    // {
    //     $this->layout = 'maintemp';
    //     $session = new Session;
    //     $session->open();

    //     unset($session['member_name']);
    //     $session->close();

    //     return $this->goHome();
    // }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $this->layout = 'maintemp';
        $session = new Session;
        $session->open();
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $this->layout = 'maintemp';
        $session = new Session;
        $session->open();
        return $this->render('index');
    }

    // public function actionSel_practice()
    // {
    //     $this->layout = 'maintemp';
    //     $session = new Session;
    //     $session->open();

    //     $model_ch = Chapter::find()->all();

    //     return $this->render('sel_practice', [
    //         'model_ch' => $model_ch,
    //     ]);
    // }

    public function actionKanji_content($chapter,$ch_name)
    {
        $this->layout = 'maintemp';
        $session = new Session;
        $session->open();

        $model = Kanji::find()->where("kanji_ch=$chapter")->all();

        return $this->render('kanji_content', [
            'model' => $model,
            'ch_name' => $ch_name,
        ]);
    }

    // public function actionPractice_content($chapter,$ch_name)
    // {
    //     $this->layout = 'maintemp';
    //     $session = new Session;
    //     $session->open();

    //     $model = Practice::find()->where("practice_ch=$chapter")->all();

    //     return $this->render('practice_content', [
    //         'model' => $model,
    //         'ch_name' => $ch_name,
    //     ]);
    // }

    // public function actionProflie()
    // {
    //     $this->layout = 'maintemp';
    //     $session = new Session;
    //     $session->open();
    //     return $this->render('proflie');
    // }

    // public function actionRegister()
    // {
    //     $this->layout = 'maintemp';
    //     $session = new Session;
    //     $session->open();
    //     return $this->render('register');
    // }

    public function actionStatic()
    {
        $this->layout = 'maintemp';
        $session = new Session;
        $session->open();
        return $this->render('static');
    }

    public function actionTemplate()
    {
        $this->layout = 'template';

        //return $this->render('admin');

        return $this->render('template');
    }

    public function actionMaintemp()
    {
        $this->layout = 'maintemp';
        $session = new Session;
        $session->open();
        return $this->render('maintemp');
    }
}
