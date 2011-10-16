<?php
$this->breadcrumbs=array(
	'Estados',
);

$this->menu=array(
	array('label'=>Yii::t('App', 'Create').' Estado', 'url'=>array('create')),
	array('label'=>Yii::t('App', 'Manage').' Estado', 'url'=>array('admin')),
);
?>

<h1>Estados</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
