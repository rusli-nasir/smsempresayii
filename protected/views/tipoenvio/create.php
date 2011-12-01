<?php
$this->breadcrumbs=array(
	'Tipoenvios'=>array('admin'),
	Yii::t('App', 'Create'),
);

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' Tipoenvio', 'url'=>array('index')),
	array('label'=>Yii::t('App', 'Manage').' Tipoenvio', 'url'=>array('admin')),
);
?>

<h1><?php  echo Yii::t('App', 'Create');?> Tipoenvio</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>