<div class="tamanyo960">
	<h1><span>Resultados de la búsqueda</span></h1>

	<?php

	foreach($churchs as $church){
		$srcImage = '';
		if($church['image']==null || $church['image'=='']){
			$srcImage = 'http://placehold.it/152x152';
		}else{
			$srcImage = Yii::app()->request->baseUrl.'/img/eiglesia/address/'.$church['image'];
		}

		$iglesiaUrl = Yii::app()->request->baseUrl.'/eiglesia/view/'.$church['id_church'];
		echo '
			<div class="cajatotal">
				<div class="fl" style="width:152px;margin-right:10px;">
					<a href="'.$iglesiaUrl.'">
						<img src="'.$srcImage.'" width="152" height="152" />
					</a>
				</div>
				<div class="fl" style="width:550px;margin-right:10px;padding-top:20px;">
					<h3><a href="'.$iglesiaUrl.'">'.$church['name'].'</a></h3>
					<p>Dirección: '.$church['street'].' '.$church['number'].'</p>
					<p>'.$church['zipcode'].' '.$church['municipality_name'].' ('.$church['province_name'].')</p>
				</div>
				<div class="fl" style="width:190px;padding-top:20px;">
					<p>Porcentaje: 0</p>
				</div>
			</div>
		';
	}
	?>
</div>