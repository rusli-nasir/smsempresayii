<?php
$this->breadcrumbs=array(
	'Infosms'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Infosms', 'url'=>array('index')),
	array('label'=>'Create Infosms', 'url'=>array('create')),
	array('label'=>'View Infosms', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Infosms', 'url'=>array('admin')),
);
?>

<h1>Update Infosms <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>