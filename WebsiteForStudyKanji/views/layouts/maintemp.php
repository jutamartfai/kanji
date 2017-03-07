<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use yii\web\session;

AppAsset::register($this);

$session = new Session;
$session->open();

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrapper">
	<div class="brand">kanji website</div>
    <div class="address-bar">by knightmare feiya</div>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.html">kanji</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href= "<?= Url::to(['/site/index']) ?>">kanji chapter</a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['/site/sel_practice']) ?>">practice chapter</a>
                    </li>
                    <?php if(isset($session['member_name'])) { ?>
                        <li class="dropdown">
                            <a href= "#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $session['member_name']; ?><span class="glyphicon glyphicon-chevron-down"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= Url::to(['/site/sel_practice']) ?>">โปรไฟล์</a></li>
                                <li><a href="<?= Url::to(['/site/sel_practice']) ?>">สถิติ</a></li>
                                <li><a href="<?= Url::to(['/site/gologout']) ?>">logout</a></li>
                            </ul>
                        </li>
                    <?php }else{ ?>
                    <li>
                        <a href="<?= Url::to(['/site/login']) ?>">login</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">
     	<div class="row">
            <div class="box">
                <div class="col-lg-12">
			        <?= Breadcrumbs::widget([
			            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
			        ]) ?>
			        <section class="content">
			        	<?= $content ?>
			        </section>
    			</div>
    		</div>
    	</div>
    </div>
</div>
	<footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; KNightmare Feiya 2017</p>
                </div>
            </div>
        </div>
    </footer>

<!-- Script to Top button -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="http://arrow.scrolltotop.com/arrow78.js"></script>
<noscript>Not seeing a <a href="http://www.scrolltotop.com/">Scroll to Top Button</a>? Go to our FAQ page for more info.</noscript>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
