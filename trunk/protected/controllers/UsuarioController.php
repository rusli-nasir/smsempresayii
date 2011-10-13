<?php

class UsuarioController extends GController
{
	public $layout='//layouts/column2';

	public function filters()
{
	return array();
}

		public function actionView()
	{
		$this->render('view',array(
			'model' => $this->loadModel(),
		));
	}

	public function actionCreate()
	{
		$model = new Usuario;

				$this->performAjaxValidation($model, 'usuario-form');
    
		if(isset($_POST['Usuario'])) {
			$model->attributes = $_POST['Usuario'];


			if($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}			
		} elseif(isset($_GET['Usuario'])) {
				$model->attributes = $_GET['Usuario'];
		}


		if(Yii::app()->request->isAjaxRequest)
			$this->renderPartial('_miniform',array( 'model'=>$model, 'relation' => $_GET['relation']));
		else
			$this->render('create',array( 'model'=>$model));
	}


	public function actionUpdate()
	{
		$model = $this->loadModel();

				$this->performAjaxValidation($model, 'usuario-form');
		
		if(isset($_POST['Usuario']))
		{
			$model->attributes = $_POST['Usuario'];


			if($model->save()) {

      $this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
					'model'=>$model,
					));
	}

	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			$this->loadModel()->delete();

			if(!isset($_GET['ajax']))
			{
				if(isset($_POST['returnUrl']))
					$this->redirect($_POST['returnUrl']); 
				else
					$this->redirect(array('admin'));
			}
		}
		else
			throw new CHttpException(400,
					Yii::t('app', 'Invalid request. Please do not repeat this request again.'));
	}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Usuario');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin()
	{
		$model=new Usuario('search');
		$model->unsetAttributes();

		if(isset($_GET['Usuario']))
			$model->attributes = $_GET['Usuario'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

}
