<?php
$this->breadcrumbs=array(
	'Grupos'=>array('admin'),
	$model->nombre=>array('view','id'=>$model->grupoid),
	Yii::t('App', 'Update'),
);

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' Grupo', 'url'=>array('index')),
	array('label'=>Yii::t('App', 'Create').' Grupo', 'url'=>array('create')),
	array('label'=>Yii::t('App', 'View').' Grupo', 'url'=>array('view', 'id'=>$model->grupoid)),
	array('label'=>Yii::t('App', 'Manage').' Grupo', 'url'=>array('admin')),
);
?>

<h1><?php  echo Yii::t('App', 'Update');?> Grupo <?php echo $model->grupoid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>