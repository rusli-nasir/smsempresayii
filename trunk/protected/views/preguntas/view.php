<?php
$this->breadcrumbs=array(
	'Preguntas'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listado de Preguntas', 'url'=>array('admin')),
	array('label'=>'Nueva Pregunta', 'url'=>array('create')),
	array('label'=>'Actualizar Pregunta', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Pregunta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Esta seguro que desea eliminar esta Pregunta?')),
);
?>

<h1>Pregunta #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_encuesta',
		'pregunta',
	),
)); ?>
