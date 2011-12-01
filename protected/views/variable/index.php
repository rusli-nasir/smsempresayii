<?php
$this->breadcrumbs=array(
	'Variables',
);

$this->menu=array(
	array('label'=>'Create Variable', 'url'=>array('create')),
	array('label'=>'Manage Variable', 'url'=>array('admin')),
);
?>

<h1>Variables</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
