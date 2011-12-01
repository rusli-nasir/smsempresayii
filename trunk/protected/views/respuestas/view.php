<?php
$this->breadcrumbs=array(
	'Respuestas'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listado de Respuestas', 'url'=>array('admin')),
	array('label'=>'Nueva Respuesta', 'url'=>array('create')),
	array('label'=>'Actualizar Respuesta', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Respuesta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Esta seguro que desea eliminar esta Respuesta?')),
);
?>

<h1>Respuestas #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'respuesta',
		'id_pregunta',
		'sig_preg',
	),
)); ?>
