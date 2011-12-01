<?php

class EnviosInstantaneosController extends Controller
{
	public $layout='//layouts/column2';
	
	public $defaultAction='admin';
	private $_model;

	public function actionAdmin()
	{
		$model=new EnviosInstantaneos('search');
		$model->unsetAttributes();
		if(isset($_GET['EnviosInstantaneos']))
			$model->attributes=$_GET['EnviosInstantaneos'];

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
ini_set("memory_limit","5000M");
header( "Content-Type: application/vnd.ms-excel; charset=utf-8" );
header( "Content-Disposition: inline; filename=\"reporte.csv\"" );
 
$dataProvider=$_SESSION['datos_filtrados']->getData();
$contador=count($dataProvider);
$i=0;
$val=count($dataProvider);
echo '"Fecha","Usuario","Telefono","Operadora","Mensaje","Estado"';
echo "\n";
//while($i<$val){
	echo $contador;
//echo '"'.$dataProvider[$i]["Fecha"].'","'.$dataProvider[$i]["Usuario"].'","'.$dataProvider[$i]["Telefono"].'","'.$dataProvider[$i]["Operadora"].'","'.$dataProvider[$i]["Mensaje"].'","'.$dataProvider[$i]["Estado"].'"';
echo "\n";
/*$i++;
flush(); 
ob_flush();		
}*/



 Yii::app()->end();
 $this->render('admin', array(
 'model' => $model,
 )); 

}
	
}