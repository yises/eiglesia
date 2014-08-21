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
		<h2 class="header">Direcciones</h2>
		<?php 
		if(count($addresss)>0){
			foreach($addresss as $address){
				echo '
					<div class="w100" >
						<p class="w30">'.$address['name'].'</p>
						<p class="w30">'.$address['street'].' '.$address['number'].'</p>
						<p class="w10">'.$address['zipcode'].'</p>
						<p class="w20">'.$address['municipality_name'].' ('.$address['province_name'].')</p>
						<p class="w10">
							<a href="'.Yii::app()->request->baseUrl.'/admin/addressUpdate/'.$address['id_address'].'">Editar</a>
							<a href="'.Yii::app()->request->baseUrl.'/admin/addressDelete/'.$address['id_address'].'">Delete</a>
						</p>
					</div>
					<div class="polosochka" style="float:left;"></div>
				';
			}
		}
		
		echo '<p><a href="'.Yii::app()->request->baseUrl.'/admin/addressCreate/?idChurch='.$model->id_church.'" class="">Añadir una dirección</a></p>';
		

		if(count($telephones)>0){
			foreach($telephones as $telephone){
				echo '
					<div class="w100" >
						<p class="w30">'.$telephone['number'].'</p>
						<p class="w30">'.$telephone['description'].'</p>
						<p class="w10">
							<a href="'.Yii::app()->request->baseUrl.'/admin/telephoneUpdate/'.$telephone['id_telephone'].'">Editar</a>
							<a href="'.Yii::app()->request->baseUrl.'/admin/telephoneDelete/'.$telephone['id_telephone'].'">Delete</a>
						</p>
					</div>
					<div class="polosochka" style="float:left;"></div>
				';
			}
		}
		echo '<p><a href="'.Yii::app()->request->baseUrl.'/admin/telephoneCreate/?idChurch='.$model->id_church.'" class="">Añadir un teléfono</a></p>';

		if(count($poboxes)>0){
			foreach($poboxes as $pobox){
				echo '
					<div class="w100" >
						<p class="w30">'.$pobox['data'].'</p>
						<p class="w10">'.$pobox['zipcode'].'</p>
						<p class="w10">
							<a href="'.Yii::app()->request->baseUrl.'/admin/poboxUpdate/'.$pobox['id_pobox'].'">Editar</a>
							<a href="'.Yii::app()->request->baseUrl.'/admin/poboxDelete/'.$pobox['id_pobox'].'">Delete</a>
						</p>
					</div>
					<div class="polosochka" style="float:left;"></div>
				';
			}
		}
		echo '<p><a href="'.Yii::app()->request->baseUrl.'/admin/poboxCreate/?idChurch='.$model->id_church.'" class="">Añadir un apartado de correos</a></p>';

		if(count($emails)>0){
			foreach($emails as $email){
				echo '
					<div class="w100" >
						<p class="w30">'.$email['email'].'</p>
						<p class="w30">'.$email['type'].'&nbsp;</p>
						<p class="w10">
							<a href="'.Yii::app()->request->baseUrl.'/admin/emailUpdate/'.$email['id_email'].'">Editar</a>
							<a href="'.Yii::app()->request->baseUrl.'/admin/emailDelete/'.$email['id_email'].'">Delete</a>
						</p>
					</div>
					<div class="polosochka" style="float:left;"></div>
				';
			}
		}
		echo '<p><a href="'.Yii::app()->request->baseUrl.'/admin/emailCreate/?idChurch='.$model->id_church.'" class="">Añadir un mail de contacto</a></p>';
		?>
	</div>

	<div id="church_www">
		<h2 class="header">Páginas web</h2>
		<?php 
		if(count($wwws)>0){
			foreach($wwws as $www){
				echo '
					<div class="w100" >
						<p class="w40"><a href="'.$www['name'].'" target="_blank">'.$www['name'].'</a></p>
						<p class="w40">'.$www['description'].'&nbsp;</p>
						<p class="w10">'.$www['type_name'].'</p>
						<p class="w10">
							<a href="'.Yii::app()->request->baseUrl.'/admin/wwwUpdate/'.$www['id_www'].'">Editar</a>
							<a href="'.Yii::app()->request->baseUrl.'/admin/wwwDelete/'.$www['id_www'].'">Delete</a>
						</p>
					</div>
					<div class="polosochka" style="float:left;"></div>
				';
			}
		}
		echo '<p><a href="'.Yii::app()->request->baseUrl.'/admin/wwwCreate/?idChurch='.$model->id_church.'" class="">Añadir una dirección web</a></p>';
		?>
	</div>

	<div id="church_gallery">
		<h2 class="header">Galerías de imágenes</h2>
		<div class="w100" >
		<?php 
		if(count($galleries)>0){
			foreach($galleries as $gallery){
				echo '
					<p>Una galería</p>
				';
			}
		}
		?>
		</div>
		<p><a href="#" class="">Añadir una galería</a></p>
	</div>

	<div id="church_servant">
		<h2 class="header">Pastores/Ancianos/Responsables</h2>
		<?php 
		if(count($servants)>0){
			foreach($servants as $servant){
				echo '';
			}
		}
		?>
		<p><a href="#" class="">Añadir un servidor</a></p>
	</div>

	<div id="church_activity">
		<h2 class="header">Actividades</h2>
		<?php 
		if(count($activities)>0){
			foreach($activities as $activity){
				echo '';
			}
		}
		?>
		<p><a href="#" class="">Añadir una actividad</a></p>
	</div>

	<div id="church_preach">
		<h2 class="header">Predicaciones</h2>
		<?php 
		if(count($preaches)>0){
			foreach($preaches as $preach){
				echo '';
			}
		}
		?>
		<p><a href="#" class="">Añadir una predicación</a></p>
	</div>
	
</div>


