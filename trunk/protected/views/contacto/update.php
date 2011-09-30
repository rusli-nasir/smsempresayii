<?php
$this->breadcrumbs=array(
	'Contactos'=>array('admin'),
	$model->contactoid=>array('view','id'=>$model->contactoid),
	Yii::t('App', 'Update'),
);

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' Contacto', 'url'=>array('index')),
	array('label'=>Yii::t('App', 'Create').' Contacto', 'url'=>array('create')),
	array('label'=>Yii::t('App', 'View').' Contacto', 'url'=>array('view', 'id'=>$model->contactoid)),
	array('label'=>Yii::t('App', 'Manage').' Contacto', 'url'=>array('admin')),
);
?>

<h1><?php  echo Yii::t('App', 'Update');?> Contacto <?php echo $model->contactoid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>