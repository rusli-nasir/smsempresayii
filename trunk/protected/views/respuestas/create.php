<?php
$this->breadcrumbs=array(
	'Respuestas'=>array('admin'),
	Yii::t('App', 'Create'),
);

$this->menu=array(
	array('label'=>'Listado de Respuestas', 'url'=>array('admin')),
);
?>

<h1>Nueva Respuesta</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>