<?php
$dataProvider = $_SESSION['datos_filtrados']->getData();
$i=0;
$val=count($dataProvider);
$data = array(
    1 => array ('Name', 'Surname'),
    array('Schwarz', 'Oliver'),
    array('Test', 'Peter')
);
Yii::import('application.extensions.phpexcel.JPhpExcel');
$xls = new JPhpExcel('UTF-8', false, 'My Test Sheet');
$xls->addArray($data);
$xls->generateXML('my-test');
?>