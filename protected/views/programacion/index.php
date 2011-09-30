<?php
$this->breadcrumbs=array(
	'Programacions',
);

$this->menu=array(
	array('label'=>'Create Programacion', 'url'=>array('create')),
	array('label'=>'Manage Programacion', 'url'=>array('admin')),
);
?>

<h1>Programacions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
