<?php
$this->breadcrumbs=array(
	'Encuestas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Encuesta', 'url'=>array('index')),
	array('label'=>'Manage Encuesta', 'url'=>array('admin')),
);
?>

<h1>Create Encuesta</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>