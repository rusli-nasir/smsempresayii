<?php
$this->breadcrumbs=array(
	'Infosms',
);

$this->menu=array(	
	array('label'=>'Listado de Keywords', 'url'=>array('admin')),
	array('label'=>'Nuevo keyword', 'url'=>array('create')),
);
?>



<h1>Infosms</h1>



<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));


 ?>

