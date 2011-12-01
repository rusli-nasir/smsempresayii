<?php
$this->breadcrumbs=array(
	'Tipoenvios',
);

$this->menu=array(
	array('label'=>'Create Tipoenvio', 'url'=>array('create')),
	array('label'=>'Manage Tipoenvio', 'url'=>array('admin')),
);
?>

<h1>Tipoenvios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
