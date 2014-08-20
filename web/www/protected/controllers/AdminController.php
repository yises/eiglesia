<?php

class AdminController extends Controller
{
	public $layout = "main";
	public function actionIndex()
	{
		$this->render('index');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/




	/* ****************************************************** */
	// Churchs


	/**
	 * Lists all models.
	 */
	public function actionChurchIndex(){
		$dataProvider=new CActiveDataProvider('Church', array(
			/*'criteria'=>array(
				'condition'=>'status=1',
				'order'=>'create_time DESC',
				'with'=>array('author'),
			),*/
			/*'countCriteria'=>array(
				'condition'=>'status=1',
			),*/
			'pagination'=>array(
				'pageSize'=>20,
			),
		));
		
		//$dataProvider=new CActiveDataProvider('Church');
		$this->render('church/church_index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionChurchView($id){
		$this->render('view',array(
			'model'=>$this->loadChurchModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionChurchCreate(){
		$model=new Church;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Church']))
		{
			$model->attributes=$_POST['Church'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_church));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionChurchUpdate($id){
		$model=$this->loadChurchModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Church'])){
			$model->attributes=$_POST['Church'];
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id_church));
			}
		}

		//We obtain the galleries, preaches, address, servants, web presence, badges, activities,...
		//$address = Address::model()->findAll('id_church='.$id);
		$sql = 'SELECT a.*,m.name as municipality_name,p.name as province_name,c.name as country_name FROM address a 
					INNER JOIN municipality m ON m.id_municipality=a.id_municipality 
					INNER JOIN province p ON p.id_province=a.id_province
					INNER JOIN country c ON c.id_country=p.id_country
				WHERE a.id_church='.$id;
		$addresss = Yii::app()->db->createCommand($sql)->queryAll();

		$sql = 'SELECT t.* FROM telephone t WHERE t.id_church='.$id;
		$telephones = Yii::app()->db->createCommand($sql)->queryAll();

		$sql = 'SELECT p.* FROM pobox p WHERE p.id_church='.$id;
		$poboxes = Yii::app()->db->createCommand($sql)->queryAll();

		$sql = 'SELECT e.* FROM email e WHERE e.id_church='.$id;
		$emails = Yii::app()->db->createCommand($sql)->queryAll();

		$galleries = Gallery::model()->findAll('id_church='.$id);
		$preaches = Preach::model()->findAll('id_church='.$id);

		$sql = 'SELECT s.* FROM servant s INNER JOIN church_servant cs ON cs.id_servant=s.id_servant WHERE cs.id_church='.$id;
		$servants = Yii::app()->db->createCommand($sql)->queryAll();

		$sql = 'SELECT w.*,wt.name as type_name FROM www w INNER JOIN www_type wt ON wt.id_www_type=w.id_www_type WHERE w.id_church='.$id;
		$wwws = Yii::app()->db->createCommand($sql)->queryAll();

		$sql = 'SELECT b.*,cb.* FROM church_badge cb INNER JOIN badge b ON b.id_badge=cb.id_badge WHERE cb.id_church='.$id;
		$badges = Yii::app()->db->createCommand($sql)->queryAll();

		$sql = 'SELECT a.*,at.* FROM activity a INNER JOIN activity_type at ON a.id_activity_type=at.id_activity_type WHERE a.id_church='.$id;
		$activities = Yii::app()->db->createCommand($sql)->queryAll();

		

		$this->render('church/church_update',array(
			'model'=>$model,
			'addresss'=>$addresss,
			'telephones'=>$telephones,
			'poboxes'=>$poboxes,
			'emails'=>$emails,
			'galleries'=>$galleries,
			'preaches'=>$preaches,
			'servants'=>$servants,
			'wwws'=>$wwws,
			'badges'=>$badges,
			'activities'=>$activities,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionChurchDelete($id){
		$this->loadChurchModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Church the loaded model
	 * @throws CHttpException
	 */
	public function loadChurchModel($id){
		$model=Church::model()->findByPk($id);
		if($model===null){
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}



	public function actionAddressCreate(){
		$model=new Address;
		if(isset($_POST['Address'])){
			$model->attributes=$_POST['Address'];
			if($model->save()){
				$this->redirect(array('ChurchUpdate','id'=>$model->id_church));
			}
		}
	}

	public function actionAddressUpdate($id){
		$model=Address::model()->findByPk($id);

		if(isset($_POST['Address'])){
			$model->attributes=$_POST['Address'];
			if($model->save()){
				$this->redirect(array('ChurchUpdate','id'=>$model->id_church));
			}
		}

		$this->render('address/address_update',array(
			'model'=>$model,
		));
	}



}