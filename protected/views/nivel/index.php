<?php
$this->breadcrumbs=array(
	'Nivels',
);

$this->menu=array(
	array('label'=>Yii::t('App', 'Create').' Nivel', 'url'=>array('create')),
	array('label'=>Yii::t('App', 'Manage').' Nivel', 'url'=>array('admin')),
);
?>

<h1>Nivels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
