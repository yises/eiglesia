<?php

class SiteController extends Controller
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


	public function actionIndex(){
		$dataGeneral = array();
		$this->render('index',$dataGeneral);
	}

	public function actionHelpSearching(){
		$dataGeneral = array();
		$this->render('help_searching',$dataGeneral);
	}

	public function actionSearch(){
		$dataGeneral = array();

		$searchTerm = $_POST['searchterm'];

		//TODO JPV In here is neccesary to make a good search, i will start making my own
		//$sql = 'SELECT id_province'
		$sql = 'SELECT id_municipality FROM municipality WHERE name LIKE "%'.$searchTerm.'%"';
		$municipality=Yii::app()->db->createCommand($sql)->queryRow();
		
		$sql = 'SELECT c.name,a.street,a.number FROM church c INNER JOIN address a ON a.id_church=c.id_church WHERE id_municipality='.$municipality['id_municipality'].' AND c.`exists`=1 AND a.is_active=1 LIMIT 0,10';
		$dataGeneral['churchs'] = Yii::app()->db->createCommand($sql)->queryAll();
		
		$this->render('search',$dataGeneral);
	}


	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionEiglesia(){
		$this->layout = "main_eiglesia_onepage";
		
		$dataGeneral = array();

		$data=array();
		//$dataGeneral['carrousel'] = $this->renderPartial('/widgets/carrousel',$data,true);
		$dataGeneral['features'] = $this->renderPartial('/widgets/features',$data,true);

		$sql = 'SELECT * FROM web_gallery LIMIT 30';
		$data['galleries']=Yii::app()->db->createCommand($sql)->queryAll();

		$dataGeneral['gallery'] = $this->renderPartial('/widgets/gallery',$data,true);


		//$dataGeneral['packs'] = $this->renderPartial('/widgets/packs',$data,true);
		$dataGeneral['team'] = $this->renderPartial('/widgets/team',$data,true);
		$dataGeneral['workWithUs'] = $this->renderPartial('/widgets/work_with_us',$data,true);
		$dataGeneral['blog'] = $this->renderPartial('/widgets/blog',$data,true);
		$dataGeneral['contact'] = $this->renderPartial('/widgets/contact',$data,true);

		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('eiglesia',$dataGeneral);
	}

	/**
	 * When you insert in the footer a mail this function insert it in our database (in the web_contact table)
	 */
	public function actionAddcontact(){
		$data = array();
		$data['stored'] = 'ko';
		if($_POST['subscribe']!='' && $_POST['email']){
			//We add the mail in our table
			$sql = 'INSERT INTO web_contact (mail,date_created) VALUES ("'.$_POST['email'].'",NOW())';
			Yii::app()->db->createCommand($sql)->execute();

			$data['stored'] = 'ok';
		}

		$this->render('contact_sent',$data);
		
	}


	/*
	 * Web where all the photos' team and his professional adventures are
	 */
	public function actionOurTeam(){
		$data = array();
		$this->render('our_team',$data);
	}

	public function actionResources(){
		$this->render('resources',array());
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
				// In case we are ok we send to the admin page
				//$this->redirect(Yii::app()->user->returnUrl);
				$this->redirect(Yii::app()->request->baseUrl.'/admin/index');
			}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}