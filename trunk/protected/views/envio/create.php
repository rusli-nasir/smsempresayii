<?php
$this->breadcrumbs=array(
	'Envios'=>array('admin'),
	Yii::t('App', 'Create'),
);

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' Envio', 'url'=>array('index')),
	array('label'=>Yii::t('App', 'Manage').' Envio', 'url'=>array('admin')),
);
?>

<h1><?php  echo Yii::t('App', 'Create');?> Envio</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>