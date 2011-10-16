<?php
$this->breadcrumbs=array(
	'Respuestases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Respuestas', 'url'=>array('index')),
	array('label'=>'Manage Respuestas', 'url'=>array('admin')),
);
?>

<h1>Create Respuestas</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>