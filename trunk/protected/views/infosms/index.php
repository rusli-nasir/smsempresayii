<?php
$this->breadcrumbs=array(
	'Infosms',
);

$this->menu=array(
	array('label'=>'Create Infosms', 'url'=>array('create')),
	array('label'=>'Manage Infosms', 'url'=>array('admin')),
);
?>

<h1>Infosms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
