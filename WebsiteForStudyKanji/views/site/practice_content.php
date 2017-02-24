<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kanji */
/* @var $form yii\widgets\ActiveForm */

$this->title = $ch_name;
$this->params['breadcrumbs'][] = ['label' => 'Practice Chapter', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<head>
	<style>
	#div1, #div2, #div3, #div4 {
	    float: left;
	    width: 100px;
	    height: 35px;
	    margin: 10px;
	    padding: 10px;
	    border: 1px solid black;
	}
	#div5{
		float: left;
	    width: 100px;
	    height: 35px;
	    margin: 10px;
	    padding: 10px;
	}
	</style>
	<script>
		function allowDrop(ev) {
		    ev.preventDefault();
		}

		function drag(ev) {
		    ev.dataTransfer.setData("text", ev.target.id);
		}

		function drop(ev) {
		    ev.preventDefault();
		    var data = ev.dataTransfer.getData("text");
		    ev.target.appendChild(document.getElementById(data));
		}
	</script>
</head>

<h1><?= Html::encode($this->title) ?></h1>
<br>
<div class="panel-group">
    <div class="panel panel-default">
        <div class="panel-body">

			<body>

			<h2>Drag and Drop</h2>
			<p>Drag the image back and forth between the two div elements.</p>

			<?php foreach ($model as $key => $value) : ?>
			<div class="row">
				<div class="col-xs-6 col-md-6">
					<div id="div5">
						<?= Html::img($value->getPhotoViewer(),['style'=>'width:100px;','class'=>'img-rounded']); ?>
					</div>
					<div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
					<div id="div4" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
				</div>
				<div class="col-xs-6 col-md-3">
					<div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
				  		<img src="<?= $value->getPhotoViewer2(); ?>" draggable="true" ondragstart="drag(event)" id="<?= $value->meaning; ?>" width="88" height="31">
					</div>
				</div>
				<div class="col-xs-6 col-md-3">
					<div id="div3" ondrop="drop(event)" ondragover="allowDrop(event)">
				  		<img src="<?= $value->getPhotoViewer3(); ?>" draggable="true" ondragstart="drag(event)" id="<?= $value->pron; ?>" width="88" height="31">
					</div>
				</div>
			</div>
			<?php endforeach ; ?>

			<!-- <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
			  <img src="img_w3slogo.gif" draggable="true" ondragstart="drag(event)" id="drag1" width="88" height="31">
			</div>

			<div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div> -->

			</body>

        </div>
    </div>
</div>