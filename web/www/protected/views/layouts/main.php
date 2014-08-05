<!DOCTYPE html>
<html>
<head>
	<!-- BASE -->
	<title>EIGLESIA</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico" />
	
	<!-- CSS -->
	<link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/normalize.css"/>
	<link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/index.css"/>
	<link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/mobile.css"/>
	<link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/component.css" />

	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!-- JS -->
	<!-- Jquery -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.1.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/global.js"></script>
</head>
<body>
	
	<div class="cbp-fbscroller">
	<header class="wraper head" style="position:relative;">
		<div class="mask"></div>
		<section class="head-els">
			<div class="logo">
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/our/logo/eiglesia_logo_small.png" alt="img">iglesia
				</a>
			</div>
			<ul class="menu h-pc">
				<li><a href="#intro" class="selected">intro</a></li>
				<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/eiglesia">Soy iglesia</a></li>
			</ul>

			<?php if(Yii::app()->user->name=='Guest'){
				echo '<div class="login">Acceder</div>';
			}else{
				echo '<div class=""><a href="'.Yii::app()->request->baseUrl.'/admin/index" class="form2 button" style="text-align:center;text-decoration:none;float:right;padding-top:10px;height:30px;">Admin</a></div>';
			}?>

			<div class="mbl-menu" id="mbl-button">
				<div class="mbl_menu_el"></div>
				<div class="mbl_menu_el"></div>
				<div class="mbl_menu_el"></div>
			</div>
			<ul class="mbl_menu_cont" id="mbl-menu">
					<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/eiglesia">Soy iglesia</a></li>
			</ul>
			<div class="clear"></div>
			
			<div class="login_form">
				<div class="triangle"></div>
				<h1> <span>Acceso</span> </h1>
				<form class="l_form" action="<?php echo Yii::app()->request->baseUrl; ?>/site/login" method="POST"> 
					<input class="l_form1" type="text" name="LoginForm[username]" placeholder="Introduce Tu E-mail">
					<input class="l_form2" type="password" name="LoginForm[password]" placeholder="Password">
					<!-- div class="l_checkbox">
						<div class="checbox-img checked" onclick="">
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/form/check.png" alt="img">
						</div>
						<p>Remember me</p>
						<div class="forgot"><a href="#">Forgot pass?</a></div>
					</div -->
					<input class="l_form3" type="submit" name="ready" value="Acceso">
					<div class="clear"></div>
				</form>
			</div>
		</section>
	</header>
	
	<?php echo $content; ?>

	<div class="clear"></div>

	<footer class="wraper">
		<section class="head-els footer">
			<div class="logo">
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/our/logo/eiglesia_logo_small.png" alt="img">
				</a>
			</div>
			<ul class="menu h-pc">
			   <li><a href="#intro" class="selected">intro</a></li>
			   <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/eiglesia">Soy iglesia</a></li>
			</ul>
			<div class="f_subscribe ">
				<form class="f_form" action="<?php echo Yii::app()->request->baseUrl; ?>/site/addcontact" method="POST"> 
					<input class="form1" type="text" name="email" placeholder="Introduce tu mail">
					<input class="form2" type="submit" name="subscribe" value="Suscribete">
				</form>
				<div class="clear"></div>
			</div>
		</section>
	</footer>
	</div>
	
	
</body>
</html>
