<?php
$this->breadcrumbs=array(
	'Preguntas'=>array('admin'),
	Yii::t('App', 'Create'),
);

$this->menu=array(
	array('label'=>'Listado de Preguntas', 'url'=>array('admin')),
);
?>

<h1>Nueva Pregunta</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>