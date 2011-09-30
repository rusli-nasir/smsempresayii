<?php
$this->breadcrumbs=array(
	'Envioses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Envios', 'url'=>array('index')),
	array('label'=>'Create Envios', 'url'=>array('create')),
	array('label'=>'View Envios', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Envios', 'url'=>array('admin')),
);
?>

<h1>Update Envios <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>