<?php
$this->breadcrumbs=array(
	'Preguntas',
);

$this->menu=array(
	array('label'=>'Listado de Preguntas', 'url'=>array('admin')),
	array('label'=>'Nueva Pregunta', 'url'=>array('create')),
);
?>

<h1>Preguntas</h1>

<?php echo $_GET['id_encuesta'];?>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
