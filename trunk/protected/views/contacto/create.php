<?php
$this->breadcrumbs=array(
	'Contactos'=>array('admin'),
	Yii::t('App', 'Create'),
);

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' Contacto', 'url'=>array('index')),
	array('label'=>Yii::t('App', 'Manage').' Contacto', 'url'=>array('admin')),
);
?>

<h1><?php  echo Yii::t('App', 'Create');?> Contacto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>