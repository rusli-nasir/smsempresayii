<?php
$this->breadcrumbs=array(
	'Programacions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Programacion', 'url'=>array('index')),
	array('label'=>'Manage Programacion', 'url'=>array('admin')),
);
?>

<h1>Create Programacion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>