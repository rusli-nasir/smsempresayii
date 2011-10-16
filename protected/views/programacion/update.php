<?php
$this->breadcrumbs=array(
	'Programacions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Programacion', 'url'=>array('index')),
	array('label'=>'Create Programacion', 'url'=>array('create')),
	array('label'=>'View Programacion', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Programacion', 'url'=>array('admin')),
);
?>

<h1>Update Programacion <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>