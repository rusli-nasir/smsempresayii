<?php
$this->breadcrumbs=array(
	'Respuestases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Respuestas', 'url'=>array('index')),
	array('label'=>'Create Respuestas', 'url'=>array('create')),
	array('label'=>'View Respuestas', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Respuestas', 'url'=>array('admin')),
);
?>

<h1>Update Respuestas <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>