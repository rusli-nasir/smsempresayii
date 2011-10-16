<?php
$this->breadcrumbs=array(
	'Infosms'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Infosms', 'url'=>array('index')),
	array('label'=>'Manage Infosms', 'url'=>array('admin')),
);
?>

<h1>Create Infosms</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>