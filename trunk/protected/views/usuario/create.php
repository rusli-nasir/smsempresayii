<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('admin'),
	Yii::t('App', 'Create'),
);

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' Usuario', 'url'=>array('index')),
	array('label'=>Yii::t('App', 'Manage').' Usuario', 'url'=>array('admin')),
);
?>

<h1><?php  echo Yii::t('App', 'Create');?> Usuario</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>