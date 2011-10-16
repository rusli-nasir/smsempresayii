<?php
if(!isset($this->breadcrumbs))

$this->breadcrumbs = array(
	'Usuarios',
	Yii::t('app', 'Index'),
);

if(!isset($this->menu))
$this->menu=array(
	array('label'=>Yii::t('app', 'Create') . ' Usuario', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' Usuario', 'url'=>array('admin')),
);
?>

<h1>Usuarios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
