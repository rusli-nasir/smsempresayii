<?php
$this->breadcrumbs=array(
	'Envios'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	Yii::t('App', 'Update'),
);

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' Envio', 'url'=>array('index')),
	array('label'=>Yii::t('App', 'Create').' Envio', 'url'=>array('create')),
	array('label'=>Yii::t('App', 'View').' Envio', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('App', 'Manage').' Envio', 'url'=>array('admin')),
);
?>

<h1><?php  echo Yii::t('App', 'Update');?> Envio <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>