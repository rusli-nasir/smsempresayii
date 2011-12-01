<?php
$this->breadcrumbs=array(
	'Respuestas',
);

$this->menu=array(
	array('label'=>'Listado de Respuestas', 'url'=>array('admin')),
	array('label'=>'Nueva Respuesta', 'url'=>array('create')),
);
?>

<h1>Respuestas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
