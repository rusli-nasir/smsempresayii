<?php
$this->breadcrumbs=array(
	'Envioses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Envios', 'url'=>array('index')),
	array('label'=>'Manage Envios', 'url'=>array('admin')),
);
?>

<h1>Create Envios</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>