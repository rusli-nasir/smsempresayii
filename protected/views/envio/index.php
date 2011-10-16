<?php
$this->breadcrumbs=array(
	'Envios',
);

$this->menu=array(
	array('label'=>'Create Envio', 'url'=>array('create')),
	array('label'=>'Manage Envio', 'url'=>array('admin')),
);
?>

<h1>Envios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
