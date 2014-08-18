<div class="tamanyo960">
	<p>Nombre: <?php echo $model->name ?></p>
	<p>Descripción: <?php echo $model->description ?></p>
	<p>Puntos: <?php echo $model->points ?></p>

	<?php
		$cosasAHacer = array();

		/*Address*/
		if(count($addresss)==0){
			$cosasAHacer[] = 'Direcciones';
		}

		/*Gallery*/
		if(count($galleries)==0){
			$cosasAHacer[] = 'Galerías de imágenes';
		}

		/*Preaches*/
		if(count($preaches)==0){
			$cosasAHacer[] = 'Predicaciones';
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

	<div id="church_address">
		<h2>Direcciones</h2>
		<?php 
		if(count($addresss)>0){
			foreach($addresss as $address){
				echo '
					<div class="w100" >
						<p class="w30">'.$address['name'].'</p>
						<p class="w30">'.$address['street'].' '.$address['number'].'</p>
						<p class="w10">'.$address['zipcode'].'</p>
						<p class="w20">'.$address['municipality_name'].' ('.$address['province_name'].')</p>
						<p class="w10">Editar</p>
					</div>
					<div class="polosochka" style="float:left;"></div>
				';
			}
		}
		?>
		<p><a href="#" class="">Añadir una dirección</a></p>

		<?php 
		if(count($telephones)>0){
			foreach($telephones as $telephone){
				echo '
					<div class="w100" >
						<p class="w30">'.$telephone['number'].'</p>
						<p class="w30">'.$telephone['description'].'</p>
						<p class="w10">Editar</p>
					</div>
					<div class="polosochka" style="float:left;"></div>
				';
			}
		}
		?>
		<p><a href="#" class="">Añadir un teléfono</a></p>

		<?php 
		if(count($poboxes)>0){
			foreach($poboxes as $pobox){
				echo '
					<div class="w100" >
						<p class="w30">'.$pobox['data'].'</p>
						<p class="w10">'.$pobox['zipcode'].'</p>
						<p class="w10">Editar</p>
					</div>
					<div class="polosochka" style="float:left;"></div>
				';
			}
		}
		?>
		<p><a href="#" class="">Añadir un apartado de correos</a></p>

		<?php 
		if(count($emails)>0){
			foreach($emails as $email){
				echo '
					<div class="w100" >
						<p class="w30">'.$email['email'].'</p>
						<p class="w30">'.$email['type'].'&nbsp;</p>
						<p class="w10">Editar</p>
					</div>
					<div class="polosochka" style="float:left;"></div>
				';
			}
		}
		?>
		<p><a href="#" class="">Añadir una dirección</a></p>
	</div>

	<div id="church_gallery">
		<h2>Galerías de imágenes</h2>
		<?php 
		if(count($galleries)>0){
			foreach($galleries as $gallery){
				echo '';
			}
		}
		?>
		<p><a href="#" class="">Añadir una galería</a></p>
	</div>

	<div id="church_preach">
		<h2>Predicaciones</h2>
		<?php 
		if(count($preaches)>0){
			foreach($preaches as $preach){
				echo '';
			}
		}
		?>
		<p><a href="#" class="">Añadir una predicación</a></p>
	</div>

	<div id="church_servant">
		<h2>Pastores/Ancianos/Responsables</h2>
		<?php 
		if(count($servants)>0){
			foreach($servants as $servant){
				echo '';
			}
		}
		?>
		<p><a href="#" class="">Añadir un servidor</a></p>
	</div>

	<div id="church_www">
		<h2>Páginas web</h2>
		<?php 
		if(count($wwws)>0){
			foreach($wwws as $www){
				echo '
					<div class="w100" >
						<p class="w40"><a href="'.$www['name'].'" target="_blank">'.$www['name'].'</a></p>
						<p class="w40">'.$www['description'].'&nbsp;</p>
						<p class="w10">'.$www['type_name'].'</p>
						<p class="w10">Editar</a></p>
					</div>
					<div class="polosochka" style="float:left;"></div>
				';
			}
		}
		?>
		<p><a href="#" class="">Añadir una dirección web</a></p>
	</div>

	<div id="church_activity">
		<h2>Actividades</h2>
		<?php 
		if(count($activities)>0){
			foreach($activities as $activity){
				echo '';
			}
		}
		?>
		<p><a href="#" class="">Añadir una actividad</a></p>
	</div>
	
</div>


