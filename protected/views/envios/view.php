<?php
$this->breadcrumbs=array(
	'Envioses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Envios', 'url'=>array('index')),
	array('label'=>'Create Envios', 'url'=>array('create')),
	array('label'=>'Update Envios', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Envios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Está seguro que quiere eliminar este item?')),
	array('label'=>'Manage Envios', 'url'=>array('admin')),
);
?>

<h1>View Envios #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'operadoraid',
		'usuarioid',
		'estadoid',
		'conversationid',
		'programacionid',
		'telefono',
		'fhoraenvio',
		'mensaje',
	),
)); ?>
