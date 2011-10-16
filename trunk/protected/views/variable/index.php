<?php
$this->breadcrumbs=array(
	'Variables',
);

$this->menu=array(
	array('label'=>Yii::t('App', 'Create').' Variable', 'url'=>array('create')),
	array('label'=>Yii::t('App', 'Manage').' Variable', 'url'=>array('admin')),
);
?>

<h1>Variables</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
