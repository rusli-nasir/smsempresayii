<?php
$this->breadcrumbs=array(
	'Nivels'=>array('admin'),
	$model->nombre=>array('view','id'=>$model->id),
	Yii::t('App', 'Update'),
);

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' Nivel', 'url'=>array('index')),
	array('label'=>Yii::t('App', 'Create').' Nivel', 'url'=>array('create')),
	array('label'=>Yii::t('App', 'View').' Nivel', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('App', 'Manage').' Nivel', 'url'=>array('admin')),
);
?>

<h1><?php  echo Yii::t('App', 'Update');?> Nivel <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>