<?php

class EnviosFiltradosController extends Controller
{
	public $layout='//layouts/column2';
	
	public $defaultAction='admin';
	private $_model;

	
	public function actionAdmin()
	{
		$model=new EnviosFiltrados('search');
		$model->unsetAttributes();
		if(isset($_GET['EnviosFiltrados']))
			$model->attributes=$_GET['EnviosFiltrados'];

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

public function actionExcel()
{
header( "Content-Type: application/vnd.ms-excel; charset=utf-8" );
header( "Content-Disposition: inline; filename=\"reporte.csv\"" );
 
$dataProvider=$_SESSION['datos_filtrados']->getData();
$i=0;
$val=count($dataProvider);
echo '"Fecha","Usuario","Telefono","Operadora","Mensaje","Estado"';
echo "\n";
while($i<$val){
echo '"'.$dataProvider[$i]["Fecha"].'","'.$dataProvider[$i]["Usuario"].'","'.$dataProvider[$i]["Telefono"].'","'.$dataProvider[$i]["Operadora"].'","'.$dataProvider[$i]["Mensaje"].'","'.$dataProvider[$i]["Estado"].'"';
echo "\n";
$i++;
}



 Yii::app()->end();
 $this->render('admin', array(
 'model' => $model,
 )); 
}
}