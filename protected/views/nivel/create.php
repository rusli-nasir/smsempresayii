<?php
$this->breadcrumbs=array(
	'Nivels'=>array('admin'),
	Yii::t('App', 'Create'),
);

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' Nivel', 'url'=>array('index')),
	array('label'=>Yii::t('App', 'Manage').' Nivel', 'url'=>array('admin')),
);
?>

<h1><?php  echo Yii::t('App', 'Create');?> Nivel</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>