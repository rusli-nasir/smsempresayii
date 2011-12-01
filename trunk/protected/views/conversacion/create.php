<?php
$this->breadcrumbs=array(
	'Conversaciones'=>array('admin'),
	Yii::t('App', 'Create'),
);

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' Conversacion', 'url'=>array('index')),
	array('label'=>Yii::t('App', 'Manage').' Conversacion', 'url'=>array('admin')),
);
?>

<h1><?php  echo Yii::t('App', 'Create');?> Conversación</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>