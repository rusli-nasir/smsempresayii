<?php
$this->breadcrumbs=array(
	'Contactos',
);

$this->menu=array(
	array('label'=>Yii::t('App', 'Create').' Contacto', 'url'=>array('create')),
	array('label'=>Yii::t('App', 'Manage').' Contacto', 'url'=>array('admin')),
);
?>

<h1>Contactos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
