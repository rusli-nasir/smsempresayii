<?php
$this->breadcrumbs=array(
	'Infosms'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Infosms', 'url'=>array('index')),
	array('label'=>'Create Infosms', 'url'=>array('create')),
	array('label'=>'Update Infosms', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Infosms', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Infosms', 'url'=>array('admin')),
);
?>

<h1>View Infosms #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'keyword',
		'descripcion',
		'fecha_creacion',
		'mensaje1',
		'mensaje2'
		
	),
)); ?>
