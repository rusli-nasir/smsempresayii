<?php
$this->breadcrumbs=array(
	'Infosms'=>array('admin'),
	Yii::t('App', 'Create'),
);

$this->menu=array(
	array('label'=>'Listado de Keywords', 'url'=>array('admin')),
);
?>

<h1>Nuevo Keyword Infosms</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>