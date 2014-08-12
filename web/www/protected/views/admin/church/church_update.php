

<?php
	//var_dump($model);
	
	/*Gallery*/
	if(count($galleries)==0){
		echo '<p>Tienes que añadir galerías de imágenes</p>';
	}

	/*Preaches*/
	if(count($preaches)==0){
		echo '<p>Tienes que añadir predicaciones</p>';
	}

	/*Address*/
	if(count($address)==0){
		echo '<p>Tienes que añadir direcciones</p>';
	}

	/*Servants*/
	if(count($servants)==0){
		echo '<p>Tienes que añadir pastores/ancianos/responsables</p>';
	}

	/*wws*/
	if(count($wwws)==0){
		echo '<p>Tienes que añadir páginas webs</p>';
	}

	/*badges*/
	if(count($badges)==0){
		echo '<p>Tienes que añadir badges</p>';
	}

	/*Activities*/
	if(count($activities)==0){
		echo '<p>Tienes que añadir actividades</p>';
	}


?>