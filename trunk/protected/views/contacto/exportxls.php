<?php

$sort = new CSort();
$sort->defaultOrder = 'contactoid DESC';


$criteria = new CDbCriteria;
$criteria->limit = 20000;
$criteria->offset = (isset($_GET['init']))?intval($_GET['init']):0;
$criteria->condition = 'grupoInicial IS NOT NULL';
$criteria->alias = 'c';
$activeDataProvider = new CActiveDataProvider($model, array(
            'criteria' => $criteria,
            'sort' => $sort,
            'pagination' => false,
        ));
$total = $activeDataProvider->totalItemCount;

$filename = 'Contactos' . time()."(".$criteria->offset."-".($criteria->offset+$criteria->limit).")";

$this->widget('application.extensions.EExcelView', array(
    //$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'contacto-grid',
    'dataProvider' => $activeDataProvider,
    'title' => $filename,
    'autoWidth' => false,
));

//$modelArray = $dataProvider->getData(true);



Yii::app()->end();
?>
