<?php

class EnviosOperadoraController extends Controller
{
	public $layout='//layouts/column2';
	
	public $defaultAction='admin';
	private $_model;
	
	public function actionAdmin()
	{
		$model=new EnviosOperadora('search');
		$model->unsetAttributes();
		if(isset($_GET['EnviosOperadora']))
			$model->attributes=$_GET['EnviosOperadora'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
public function actionPdf()
{
$this->render('pdf');
}
}