<div class="tamanyo960">
	<h1><span>Resultados de la búsqueda</span></h1>

	<?php

	foreach($churchs as $church){
		echo '
			<div class="cajatotal">
				<h3>'.$church['name'].'</h3>
				<p>Dirección: '.$church['street'].' '.$church['number'].'</p>
				<p>'.$church['zipcode'].' '.$church['municipality_name'].' ('.$church['province_name'].')</p>
			</div>
		';
	}
	?>
</div>