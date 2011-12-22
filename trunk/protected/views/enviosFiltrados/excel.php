<?php 
echo "hola";
$dataProvider=$_SESSION['datos_filtrados']->getData();
$i=0;
$val=count($dataProvider);
echo count($dataProvider);
while($i<$val){
echo $dataProvider[$i]["Fecha"].','.$dataProvider[$i]["Usuario"].','.$dataProvider[$i]["Telefono"].','.$dataProvider[$i]["Operadora"].','.$dataProvider[$i]
["Mensaje"].','.$dataProvider[$i]["Estado"].'\n';
$i++;
}

/*Yii::app()->end();
 $this->render('admin', array(
 'model' => $model,
 ));*/ 

?>