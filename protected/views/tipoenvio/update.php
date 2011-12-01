<?php
$this->breadcrumbs=array(
	'Tipoenvios'=>array('admin'),
	$model->nombre=>array('view','id'=>$model->tipoid),
	Yii::t('App', 'Update'),
);

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' Tipoenvio', 'url'=>array('index')),
	array('label'=>Yii::t('App', 'Create').' Tipoenvio', 'url'=>array('create')),
	array('label'=>Yii::t('App', 'View').' Tipoenvio', 'url'=>array('view', 'id'=>$model->tipoid)),
	array('label'=>Yii::t('App', 'Manage').' Tipoenvio', 'url'=>array('admin')),
);
?>

<h1><?php  echo Yii::t('App', 'Update');?> Tipoenvio <?php echo $model->tipoid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>