<?php
$this->breadcrumbs=array(
	'Rols',
);

$this->menu=array(
	array('label'=>Yii::t('App', 'Create').' Rol', 'url'=>array('create')),
	array('label'=>Yii::t('App', 'Manage').' Rol', 'url'=>array('admin')),
);
?>

<h1>Rols</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
