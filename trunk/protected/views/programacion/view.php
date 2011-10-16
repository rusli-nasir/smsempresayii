<?php
$this->breadcrumbs=array(
	'Programacions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Programacion', 'url'=>array('index')),
	array('label'=>'Create Programacion', 'url'=>array('create')),
	array('label'=>'Update Programacion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Programacion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Está seguro que quiere eliminar este item?')),
	array('label'=>'Manage Programacion', 'url'=>array('admin')),
);
?>

<h1>View Programacion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'asunto',
		'fechaInicio',
		'fechaFin',
		'activo',
	),
)); ?>
