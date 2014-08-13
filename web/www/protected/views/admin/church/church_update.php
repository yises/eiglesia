
<p>Nombre: <?php echo $model->name ?></p>
<p>Descripción: <?php echo $model->description ?></p>
<p>Puntos: <?php echo $model->points ?></p>

<?php
	$cosasAHacer = array();

	/*Gallery*/
	if(count($galleries)==0){
		$cosasAHacer[] = 'Galerías de imágenes';
	}

	/*Preaches*/
	if(count($preaches)==0){
		$cosasAHacer[] = 'Predicaciones';
	}

	/*Address*/
	if(count($address)==0){
		$cosasAHacer[] = 'Direcciones';
	}

	/*Servants*/
	if(count($servants)==0){
		$cosasAHacer[] = 'Pastores/ancianos/responsables';
	}

	/*wws*/
	if(count($wwws)==0){
		$cosasAHacer[] = 'Páginas webs';
	}

	/*badges*/
	if(count($badges)==0){
		$cosasAHacer[] = 'Badges';
	}

	/*Activities*/
	if(count($activities)==0){
		$cosasAHacer[] = 'Actividades';
	}

	if(count($cosasAHacer)==0){
		echo '<p>Ya no puedes obtener mejor puntuación</p>';
	}else{
		echo '
			<p>Para que la iglesia se posicione mejor es necesario que añadas:</p>
			<ul>';
		foreach($cosasAHacer as $item){
			echo '<li>'.$item.'</li>';
		}
		echo '</ul>';
	}
?>

