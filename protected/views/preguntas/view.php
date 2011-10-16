<?php
$this->breadcrumbs=array(
	'Preguntases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Preguntas', 'url'=>array('index')),
	array('label'=>'Create Preguntas', 'url'=>array('create')),
	array('label'=>'Update Preguntas', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Preguntas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Preguntas', 'url'=>array('admin')),
);
?>

<h1>View Preguntas #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_encuesta',
		'pregunta',
	),
)); ?>
