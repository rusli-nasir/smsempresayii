<?php
$this->breadcrumbs=array(
	'Estados'=>array('admin'),
	$model->nombre=>array('view','id'=>$model->id),
	Yii::t('App', 'Update'),
);

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' Estado', 'url'=>array('index')),
	array('label'=>Yii::t('App', 'Create').' Estado', 'url'=>array('create')),
	array('label'=>Yii::t('App', 'View').' Estado', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('App', 'Manage').' Estado', 'url'=>array('admin')),
);
?>

<h1><?php  echo Yii::t('App', 'Update');?> Estado <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>