<section class="wraper_bg-bright" id="features">
	<h1><?php echo Yii::t('site','Almacenado de correo')?></h1>
<?php
if($stored!=null && $stored!=''){
	if($stored == 'ok'){
		echo '<p>'.Yii::t('site','Tu mail se ha almacenado correctamente').'</p>';
	}else{
		echo '<p>'.Yii::t('site','Ha habido algún problema al almacenar tu mail, inténtalo otra vez').'</p>';
	}
}

?>

</section>