<?php
$this->breadcrumbs=array(
	'Rols'=>array('admin'),
	Yii::t('App', 'Create'),
);

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' Rol', 'url'=>array('index')),
	array('label'=>Yii::t('App', 'Manage').' Rol', 'url'=>array('admin')),
);
?>

<h1><?php  echo Yii::t('App', 'Create');?> Rol</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>