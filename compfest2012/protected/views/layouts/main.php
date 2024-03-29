<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
	
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-1.8.22.custom.min.js" type="text/javascript"></script>
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<?php 
		Yii::app()->user->setReturnUrl(Yii::app()->user->getState("url")); 
		Yii::app()->user->setState("url",Yii::app()->request->requestUri);
	?>
</head>

<body>
	
	<div id="header">
		<div id="logo">
			<!-- <?php echo CHtml::encode(Yii::app()->name); ?> -->
			<span style="color:#33c7c7;">D</span><span style="color:#ff6a9a;">U</span><span style="color:#feca65;">N</span><span style="color:#67cb99;">I</span><span style="color:#ff6431;">A</span>
			<span style="color:#9e6ca1;">A</span><span style="color:#fd9bce;">N</span><span style="color:#5f5f5f;">A</span><span style="color:#31ce65;">K</span>
			<span style="color:#ff642f;">C</span><span style="color:#ff999d;">E</span><span style="color:#64cccb;">R</span><span style="color:#fc9836;">D</span><span style="color:#936594;">A</span><span style="color:#46c2ca;">S</span>
		</div>
		<div id="motto">
			Belajar apapun, dimanapun dan kapanpun kamu mau!
		</div>
	</div>
	<!-- header -->
	
	<br><br>
	<div id="mainmenu" class="left">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Beranda', 'url'=>array('/site/index')),
				array('label'=>'Materi', 'url'=>array('/materi/index')),
				array('label'=>'Masuk', 'url'=>array('/user/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Daftar', 'url'=>array('/user/register'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Buat Materi', 'url'=>array('/materi/create'), 'visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('type')==1),
				array('label'=>'Edit Materi', 'url'=>array('/materi/manage'), 'visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('type')==1),
				array('label'=>'Keluar', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div>
	<!-- mainmenu -->
	
	<div class="breadcrumbs">
		<?php if(isset($this->breadcrumbs)):?>
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'homeLink'=>CHtml::link('Home', array('/site/index')),
				'links'=>$this->breadcrumbs,
				'separator'=>'',
			)); ?>
			<!-- breadcrumbs -->
		<?php endif?>
	</div>
	<br>	
	<div class="container" id="page" class="left">
		<?php echo $content; ?>
	
		<div class="clear"></div>
	
	</div><!-- page -->
	
	<div id="footer">
		<?php echo CHtml::link("Tentang Kami",Yii::app()->baseUrl."/site/about"); ?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
		<?php echo CHtml::link("FAQ",Yii::app()->baseUrl."/site/faq"); ?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
		<?php echo CHtml::link("Hubungi Kami",Yii::app()->baseUrl."/site/contact"); ?>
	</div><!-- footer -->
	<script type="text/javascript">
		$(document).ready(function(){
			var index = 10;
			$(".breadcrumbs").children().each(function(){
				$(this).attr('style','z-index:'+index+';position:relative;');
				index--;
			});
		});		
	</script>
</body>
</html>
