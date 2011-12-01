<?php
$this->breadcrumbs=array(
	'Conversaciones'=>array('admin'),
	$model->titulo=>array('view','id'=>$model->conversacionid),
	Yii::t('App', 'Update'),
);

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' Conversacion', 'url'=>array('index')),
	array('label'=>Yii::t('App', 'Create').' Conversacion', 'url'=>array('create')),
	array('label'=>Yii::t('App', 'View').' Conversacion', 'url'=>array('view', 'id'=>$model->conversacionid)),
	array('label'=>Yii::t('App', 'Manage').' Conversacion', 'url'=>array('admin')),
);
?>

<h1><?php  echo Yii::t('App', 'Update');?> Conversación <?php echo $model->conversacionid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>