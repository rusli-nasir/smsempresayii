<?php
$this->breadcrumbs=array(
	'Encuestas'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listado de Keywords', 'url'=>array('admin')),
	array('label'=>'Nuevo Keyword', 'url'=>array('create')),
	array('label'=>'Actualizar Keywords', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Keyword', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Esta seguro que desea eliminar este Keyword?')),
);
?>

<h1>Encuesta #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'keyword',
		'descripcion',
		'fecha_creacion'		
	),
)); ?>
