<?php
$this->breadcrumbs=array(
	'Estados'=>array('admin'),
	Yii::t('App', 'Create'),
);

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' Estado', 'url'=>array('index')),
	array('label'=>Yii::t('App', 'Manage').' Estado', 'url'=>array('admin')),
);
?>

<h1><?php  echo Yii::t('App', 'Create');?> Estado</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>