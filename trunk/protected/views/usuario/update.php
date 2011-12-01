<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('admin'),
	$model->nombre=>array('view','id'=>$model->id),
	Yii::t('App', 'Update'),
);

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' Usuario', 'url'=>array('index')),
	array('label'=>Yii::t('App', 'Create').' Usuario', 'url'=>array('create')),
	array('label'=>Yii::t('App', 'View').' Usuario', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('App', 'Manage').' Usuario', 'url'=>array('admin')),
);
?>

<h1><?php  echo Yii::t('App', 'Update');?> Usuario <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>