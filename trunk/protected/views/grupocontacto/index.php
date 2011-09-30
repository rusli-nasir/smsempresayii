<?php
if(!isset($this->breadcrumbs))

$this->breadcrumbs = array(
	'Grupocontactos',
	Yii::t('app', 'Index'),
);

if(!isset($this->menu))
$this->menu=array(
	array('label'=>Yii::t('app', 'Create') . ' Grupocontacto', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' Grupocontacto', 'url'=>array('admin')),
);
?>

<h1>Grupocontactos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
