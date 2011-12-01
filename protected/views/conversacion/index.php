<?php
$this->breadcrumbs=array(
	'Conversacions',
);

$this->menu=array(
	array('label'=>'Create Conversacion', 'url'=>array('create')),
	array('label'=>'Manage Conversacion', 'url'=>array('admin')),
);
?>

<h1>Conversacions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
