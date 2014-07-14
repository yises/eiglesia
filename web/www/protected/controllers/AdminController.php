<?php

class AdminController extends Controller
{
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
		$dataProvider=new CActiveDataProvider('Church');
		$this->render('church/church_index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionChurchView($id)
    {
        $this->render('view',array(
            'model'=>$this->loadChurchModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionChurchCreate()
    {
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
    public function actionChurchUpdate($id)
    {
        $model=$this->loadChurchModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Church']))
        {
            $model->attributes=$_POST['Church'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id_church));
        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionChurchDelete($id)
    {
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
    public function loadChurchModel($id)
    {
        $model=Church::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

}