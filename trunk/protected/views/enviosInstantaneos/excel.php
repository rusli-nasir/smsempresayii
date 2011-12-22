<?
Yii::import('application.extensions.CSVExport');
$provider = $_SESSION['datos_filtrados']->getData();
$csv = new CSVExport($provider);
$content = $csv->toCSV();
$content = $csv->toCSV('../myfilename.csv', "\t", "'");                 
Yii::app()->getRequest()->sendFile($filename, $content, "text/csv", false);
exit();
?>