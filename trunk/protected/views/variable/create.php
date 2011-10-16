<?php
$this->breadcrumbs=array(
	'Variables'=>array('index'),
	Yii::t('App', 'Create'),
);

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' Variable', 'url'=>array('index')),
	array('label'=>Yii::t('App', 'Manage').' Variable', 'url'=>array('admin')),
);
?>

<h1><?php  echo Yii::t('App', 'Create');?> Variable</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>