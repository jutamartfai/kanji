<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Chapter;
use app\models\Kanji;
use app\models\Practice;

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

        $model_ch = Chapter::find()->all();

        return $this->render('index', [
            'model_ch' => $model_ch,
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'maintemp';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
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
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $this->layout = 'maintemp';
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
        return $this->render('index');
    }

    public function actionSel_practice()
    {
        $this->layout = 'maintemp';

        $model_ch = Chapter::find()->all();

        return $this->render('sel_practice', [
            'model_ch' => $model_ch,
        ]);
    }

    public function actionKanji_content($chapter,$ch_name)
    {
        $this->layout = 'maintemp';

        $model = Kanji::find()->where("kanji_ch=$chapter")->all();

        return $this->render('kanji_content', [
            'model' => $model,
            'ch_name' => $ch_name,
        ]);
    }

    public function actionPractice_content($chapter,$ch_name)
    {
        $this->layout = 'maintemp';

        $model = Practice::find()->where("practice_ch=$chapter")->all();

        return $this->render('practice_content', [
            'model' => $model,
            'ch_name' => $ch_name,
        ]);
    }

    public function actionTemplate()
    {
        $this->layout = 'template';

        if (!Yii::$app->user->isGuest) {
            return $this->render('template');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);

        //return $this->render('template');
    }

    public function actionMaintemp()
    {
        $this->layout = 'maintemp';
        return $this->render('maintemp');
    }
}
