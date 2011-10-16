<?php
$this->breadcrumbs=array(
	'Preguntases',
);

$this->menu=array(
	array('label'=>'Create Preguntas', 'url'=>array('create')),
	array('label'=>'Manage Preguntas', 'url'=>array('admin')),
);
?>

<h1>Preguntases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
