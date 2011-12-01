<?php
$this->breadcrumbs=array(
	'Roles'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	Yii::t('App', 'Update'),
);

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' Rol', 'url'=>array('index')),
	array('label'=>Yii::t('App', 'Create').' Rol', 'url'=>array('create')),
	array('label'=>Yii::t('App', 'View').' Rol', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('App', 'Manage').' Rol', 'url'=>array('admin')),
);
?>

<h1><?php  echo Yii::t('App', 'Update');?> Rol <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>