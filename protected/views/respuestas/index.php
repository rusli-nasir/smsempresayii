<?php
$this->breadcrumbs=array(
	'Respuestases',
);

$this->menu=array(
	array('label'=>'Create Respuestas', 'url'=>array('create')),
	array('label'=>'Manage Respuestas', 'url'=>array('admin')),
);
?>

<h1>Respuestases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
