<h1>Resultados de la búsqueda</h1>

<?php

foreach($churchs as $church){
	echo '
		<h3>'.$church['name'].'</h3>
		<p>Dirección: '.$church['street'].' '.$church['number'].'</p>
	';
}
?>