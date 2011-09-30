<?php
$this->breadcrumbs=array(
	'Variables'=>array('index'),
	$model->nombre=>array('view','id'=>$model->id),
	Yii::t('App', 'Update'),
);

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' Variable', 'url'=>array('index')),
	array('label'=>Yii::t('App', 'Create').' Variable', 'url'=>array('create')),
	array('label'=>Yii::t('App', 'View').' Variable', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('App', 'Manage').' Variable', 'url'=>array('admin')),
);
?>

<h1><?php  echo Yii::t('App', 'Update');?> Variable <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>