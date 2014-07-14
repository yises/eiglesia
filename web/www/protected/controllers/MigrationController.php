<?php

class MigrationController extends Controller
{
	public $layout = "main";
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
		);
	}

	public function actionTablaOrigen(){


		$sql = "UPDATE  zzz_final030614 SET  denom =  'Anglicana' WHERE  denom ='anglicana'";
		Yii::app()->db->createCommand($sql)->execute();

		$sql = "UPDATE  zzz_final030614 SET  denom =  'Pentecostal' WHERE  denom ='pentecostal'";
		Yii::app()->db->createCommand($sql)->execute();

		$sql = "UPDATE  zzz_final030614 SET  denom =  'Metodista' WHERE  denom ='metodista'";
		Yii::app()->db->createCommand($sql)->execute();

		$sql = "UPDATE  zzz_final030614 SET  denom =  'Mesianica' WHERE  denom ='mesianica'";
		Yii::app()->db->createCommand($sql)->execute();

		$sql = "UPDATE  zzz_final030614 SET  denom =  'Independiente' WHERE  denom ='independiente'";
		Yii::app()->db->createCommand($sql)->execute();

		$sql = "UPDATE  zzz_final030614 SET  denom =  'Escocesa' WHERE  denom ='escocesa'";
		Yii::app()->db->createCommand($sql)->execute();

		$sql = "UPDATE  zzz_final030614 SET  denom =  'Carismatica' WHERE  denom ='carismatica'";
		Yii::app()->db->createCommand($sql)->execute();

		$sql = "UPDATE  zzz_final030614 SET  denom =  'Accorema' WHERE  denom ='ACCOREMA'";
		Yii::app()->db->createCommand($sql)->execute();

		$sql = "UPDATE  zzz_final030614 SET  denom =  'China' WHERE  denom ='china'";
		Yii::app()->db->createCommand($sql)->execute();

		$sql = "UPDATE  zzz_final030614 SET  denom =  'Carismatica' WHERE  denom ='carismatica'";
		Yii::app()->db->createCommand($sql)->execute();

		$sql = "UPDATE  zzz_final030614 SET  denom =  'Mesianica' WHERE  denom ='mesianica'";
		Yii::app()->db->createCommand($sql)->execute();

		$sql = "UPDATE  zzz_final030614 SET  denom =  'Pentecostal' WHERE  denom ='pentecostal'";
		Yii::app()->db->createCommand($sql)->execute();

		$sql = "UPDATE  zzz_final030614 SET  denom =  'Escocesa' WHERE  denom ='escocesa'";
		Yii::app()->db->createCommand($sql)->execute();

		$sql = "UPDATE  zzz_final030614 SET  denom =  'Presbitariana' WHERE  denom ='Presbitariana?'";
		Yii::app()->db->createCommand($sql)->execute();

		$sql = "UPDATE  zzz_final030614 SET  denom =  'Pentecostal Independiente' WHERE  denom ='Pentecostal Indepentiente'";
		Yii::app()->db->createCommand($sql)->execute();

		$sql = "UPDATE  zzz_final030614 SET  denom =  'AAHH' WHERE  denom ='AAHH?'";
		Yii::app()->db->createCommand($sql)->execute();

		/* 

		*/
		die();

	}

	public function actionIndex(){
		//Si se vuelve a cargar la BBDD SERÁ NECESARIO PASAR LAS SIGUIENTES QUERIES
		/* 
			UPDATE  zzz_final030614 SET  denom =  'Anglicana' WHERE  denom ='anglicana';
			UPDATE  zzz_final030614 SET  denom =  'Pentecostal' WHERE  denom ='pentecostal';
			UPDATE  zzz_final030614 SET  denom =  'Metodista' WHERE  denom ='metodista';
			UPDATE  zzz_final030614 SET  denom =  'Mesianica' WHERE  denom ='mesianica';
			UPDATE  zzz_final030614 SET  denom =  'Independiente' WHERE  denom ='independiente';
			UPDATE  zzz_final030614 SET  denom =  'Escocesa' WHERE  denom ='escocesa';
			UPDATE  zzz_final030614 SET  denom =  'Carismatica' WHERE  denom ='carismatica';
			UPDATE  zzz_final030614 SET  denom =  'Accorema' WHERE  denom ='ACCOREMA';
		*/
		

		$truncateTablas = true;
		$valoresConstantes = true;

		$sacarProvincias = true;
		$sacarMunicipios = true;
		$sacarDenominaciones = true;

		$sacarIglesias = true;


		if($valoresConstantes){
			$sql = 'TRUNCATE www_type';
			Yii::app()->db->createCommand($sql)->execute();
			echo '<p>www_type vaciado</p>';

			$sql = "INSERT INTO www_type (id_www_type,name) VALUES (1,'web')";
			Yii::app()->db->createCommand($sql)->execute();

			$sql = "INSERT INTO www_type (id_www_type,name) VALUES (2,'facebook')";
			Yii::app()->db->createCommand($sql)->execute();

			$sql = "INSERT INTO www_type (id_www_type,name) VALUES (3,'twitter')";
			Yii::app()->db->createCommand($sql)->execute();

			$sql = "INSERT INTO www_type (id_www_type,name) VALUES (4,'youtube')";
			Yii::app()->db->createCommand($sql)->execute();

			$sql = "INSERT INTO www_type (id_www_type,name) VALUES (5,'gplus')";
			Yii::app()->db->createCommand($sql)->execute();

		}

		//Hallamos primeramente todas las provincias 
		if($sacarProvincias){

			if($truncateTablas){
				$sql = 'TRUNCATE province';
				Yii::app()->db->createCommand($sql)->execute();
				echo '<p>Province vaciado</p>';
			}


			$provincias=array();
			$sql = 'SELECT DISTINCT provincia FROM zzz_final030614';
			$provincias=Yii::app()->db->createCommand($sql)->queryAll();

			echo '<p>Deberian insertarse '.count($provincias).' provincias.</p>';
			$num = 0;
			foreach($provincias as $provincia){
				$sql = "INSERT INTO province (name,id_country) VALUES ('".$provincia["provincia"]."',1)";
				Yii::app()->db->createCommand($sql)->execute();
				$num++;
			}
			echo '<p>Provincias:'.$num.'</p>';
		}

		if($sacarMunicipios){
			if($truncateTablas){
				$sql = 'TRUNCATE municipality';
				Yii::app()->db->createCommand($sql)->execute();
				echo '<p>Municipality vaciado</p>';
			}

			$municipios=array();
			$sql = 'SELECT DISTINCT(municipio),provincia FROM zzz_final030614';
			$municipios=Yii::app()->db->createCommand($sql)->queryAll();

			echo '<p>Deberian insertarse '.count($municipios).' municipios.</p>';
			$num = 0;
			foreach($municipios as $municipio){
				$sql = 'SELECT id_province FROM province WHERE name="'.$municipio['provincia'].'"';
				$provincia=Yii::app()->db->createCommand($sql)->queryRow();

				$sql = 'INSERT INTO municipality (name,id_province) VALUES ("'.$municipio["municipio"].'","'.$provincia["id_province"].'")';
				Yii::app()->db->createCommand($sql)->execute();
				$num++;
			}

			echo '<p>Municipios:'.$num.'</p>';
		}

		if($sacarDenominaciones){
			if($truncateTablas){
				$sql = 'TRUNCATE denomination';
				Yii::app()->db->createCommand($sql)->execute();
				echo '<p>Denomination vaciado</p>';
			}

			$denominaciones=array();
			$sql = 'SELECT DISTINCT denom FROM zzz_final030614';
			$denominaciones=Yii::app()->db->createCommand($sql)->queryAll();

			echo '<p>Deberian insertarse '.count($denominaciones).' denominaciones.</p>';
			$num = 0;
			foreach($denominaciones as $denominacion){
				$sql = "INSERT INTO denomination (name) VALUES ('".$denominacion["denom"]."')";
				Yii::app()->db->createCommand($sql)->execute();
				$num++;
			}
			echo '<p>Denominaciones:'.$num.'</p>';
		}

		if($sacarIglesias){

			if($truncateTablas){
				$sql = 'TRUNCATE church';
				Yii::app()->db->createCommand($sql)->execute();
				echo '<p>Church vaciado</p>';

				$sql = 'TRUNCATE address';
				Yii::app()->db->createCommand($sql)->execute();
				echo '<p>Address vaciado</p>';

				$sql = 'TRUNCATE pobox';
				Yii::app()->db->createCommand($sql)->execute();
				echo '<p>Pobox vaciado</p>';

				$sql = 'TRUNCATE telephone';
				Yii::app()->db->createCommand($sql)->execute();
				echo '<p>Telephone vaciado</p>';

				$sql = 'TRUNCATE email';
				Yii::app()->db->createCommand($sql)->execute();
				echo '<p>Email vaciado</p>';

				$sql = 'TRUNCATE www';
				Yii::app()->db->createCommand($sql)->execute();
				echo '<p>WWW vaciado</p>';
			}

			$iglesias=array();
			$sql = 'SELECT * FROM zzz_final030614';
			$iglesias=Yii::app()->db->createCommand($sql)->queryAll();

			echo '<p>Deberian insertarse '.count($iglesias).' iglesias.</p>';
			$num = 0; $numApartados=0; $numTelefonos=0;	$numEmails=0; $numWebs=0;

			foreach($iglesias as $iglesia){
				$existe = 0;
				if($iglesia["existe"]=='Si'){
					$existe = 1;
				}

				//Hallamos el id de la denominacion
				$sql = 'SELECT id_denomination FROM denomination WHERE name="'.$iglesia['denom'].'"';
				$denominacion=Yii::app()->db->createCommand($sql)->queryRow();

				$sql = 'INSERT INTO church (name,id_motherchurch,numbermember,`exists`,id_denomination) VALUES ("'.$iglesia["nombre"].'",'.$iglesia["igmadre"].','.$iglesia["miembros"].','.$existe.','.$denominacion['id_denomination'].')';
				Yii::app()->db->createCommand($sql)->execute();

				$idChurch = Yii::app()->db->getLastInsertID();
				$sql = 'SELECT id_province FROM province WHERE name="'.$iglesia['provincia'].'"';
				$provincia=Yii::app()->db->createCommand($sql)->queryRow();
				$sql = 'SELECT id_municipality FROM municipality WHERE name="'.$iglesia['municipio'].'"';
				$municipality=Yii::app()->db->createCommand($sql)->queryRow();
				

				$sql = 'INSERT INTO address (latitude,longitude,name,street,`number`,zipcode,is_active,id_church,id_municipality,id_province) VALUES ("'.$iglesia["lat"].'","'.$iglesia["lon"].'","'.$iglesia["nombre"].'","'.$iglesia["direccion"].'","'.$iglesia["numero"].' '.$iglesia["extra"].'","'.$iglesia["cp"].'",'.$existe.','.$idChurch.','.$municipality['id_municipality'].','.$provincia['id_province'].')';
				Yii::app()->db->createCommand($sql)->execute();

				//En caso de que tenga apartado de correos
				if($iglesia['apdo']!='' || $iglesia['cpapdo']!=''){
					$sql = 'INSERT INTO pobox (id_church,data,zipcode) VALUES ('.$idChurch.',"'.$iglesia["apdo"].'","'.$iglesia['cpapdo'].'")';
					Yii::app()->db->createCommand($sql)->execute();
					$numApartados++;
				}

				//En caso de que tenga teléfono lo incluimos
				if($iglesia['tlf1']!='' || $iglesia['tlf2']!='' || $iglesia['mvl1']!='' || $iglesia['mvl2']!='' || $iglesia['fax']!=''){
					if($iglesia['tlf1']!=''){
						$sql = 'INSERT INTO telephone (id_church,`number`,description) VALUES ("'.$idChurch.'","'.$iglesia["tlf1"].'","fijo 1")';
						Yii::app()->db->createCommand($sql)->execute();
						$numTelefonos++;
					}

					if($iglesia['tlf2']!=''){
						$sql = 'INSERT INTO telephone (id_church,`number`,description) VALUES ("'.$idChurch.'","'.$iglesia["tlf2"].'","fijo 2")';
						Yii::app()->db->createCommand($sql)->execute();
						$numTelefonos++;
					}

					if($iglesia['mvl1']!=''){
						$sql = 'INSERT INTO telephone (id_church,`number`,description) VALUES ("'.$idChurch.'","'.$iglesia["mvl1"].'","movil 1")';
						Yii::app()->db->createCommand($sql)->execute();
						$numTelefonos++;
					}

					if($iglesia['mvl2']!=''){
						$sql = 'INSERT INTO telephone (id_church,`number`,description) VALUES ("'.$idChurch.'","'.$iglesia["mvl2"].'","movil 2")';
						Yii::app()->db->createCommand($sql)->execute();
						$numTelefonos++;
					}

					if($iglesia['fax']!=''){
						$sql = 'INSERT INTO telephone (id_church,`number`,description) VALUES ("'.$idChurch.'","'.$iglesia["fax"].'","fax")';
						Yii::app()->db->createCommand($sql)->execute();
						$numTelefonos++;
					}
				}

				//En caso de que tenga mail lo incluimos
				if($iglesia['email1']!='' || $iglesia['email2']!=''){
					if($iglesia['email1']!=''){
						$sql = 'INSERT INTO email (id_church,email,type) VALUES ("'.$idChurch.'","'.$iglesia["email1"].'","Email1")';
						Yii::app()->db->createCommand($sql)->execute();
						$numEmails++;
					}

					if($iglesia['email2']!=''){
						$sql = 'INSERT INTO email (id_church,email,type) VALUES ("'.$idChurch.'","'.$iglesia["email2"].'","Email1")';
						Yii::app()->db->createCommand($sql)->execute();
						$numEmails++;
					}
				}

				if($iglesia['web1']!='' || $iglesia['web2']!='' || $iglesia['facebook']!='' || $iglesia['twitter']!='' || $iglesia['youtube']!='' || $iglesia['gplus']!=''){
					if($iglesia['web1']!=''){
						$sql = 'INSERT INTO www (id_church,id_www_type,name) VALUES ("'.$idChurch.'",1,"'.$iglesia["web1"].'")';
						Yii::app()->db->createCommand($sql)->execute();
						$numWebs++;
					}
					if($iglesia['web2']!=''){
						$sql = 'INSERT INTO www (id_church,id_www_type,name) VALUES ("'.$idChurch.'",1,"'.$iglesia["web2"].'")';
						Yii::app()->db->createCommand($sql)->execute();
						$numWebs++;
					}
					if($iglesia['facebook']!=''){
						$sql = 'INSERT INTO www (id_church,id_www_type,name) VALUES ("'.$idChurch.'",2,"'.$iglesia["facebook"].'")';
						Yii::app()->db->createCommand($sql)->execute();
						$numWebs++;
					}
					if($iglesia['twitter']!=''){
						$sql = 'INSERT INTO www (id_church,id_www_type,name) VALUES ("'.$idChurch.'",3,"'.$iglesia["twitter"].'")';
						Yii::app()->db->createCommand($sql)->execute();
						$numWebs++;
					}
					if($iglesia['youtube']!=''){
						$sql = 'INSERT INTO www (id_church,id_www_type,name) VALUES ("'.$idChurch.'",4,"'.$iglesia["youtube"].'")';
						Yii::app()->db->createCommand($sql)->execute();
						$numWebs++;
					}
					if($iglesia['gplus']!=''){
						$sql = 'INSERT INTO www (id_church,id_www_type,name) VALUES ("'.$idChurch.'",5,"'.$iglesia["gplus"].'")';
						Yii::app()->db->createCommand($sql)->execute();
						$numWebs++;
					}
				}


				$num++;
			}
			echo '<p>Iglesias y direcciones:'.$num.'</p>';
			echo '<p>Apartados de correos:'.$numApartados.'</p>';
			echo '<p>Telefonos:'.$numTelefonos.'</p>';
			echo '<p>Emails:'.$numEmails.'</p>';
			echo '<p>Webs:'.$numWebs.'</p>';
		}
	}
}