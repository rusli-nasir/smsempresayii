<?php
$this->breadcrumbs=array(
	'Preguntases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Preguntas', 'url'=>array('index')),
	array('label'=>'Manage Preguntas', 'url'=>array('admin')),
);
?>

<h1>Create Preguntas</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>