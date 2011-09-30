<?php
$this->breadcrumbs=array(
	'Envioses',
);

$this->menu=array(
	array('label'=>'Create Envios', 'url'=>array('create')),
	array('label'=>'Manage Envios', 'url'=>array('admin')),
);
?>

<h1>Envioses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
