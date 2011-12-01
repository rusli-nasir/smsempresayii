<?php
$this->breadcrumbs=array(
	'Preguntas'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	Yii::t('App', 'Update'),
);

$this->menu=array(
	array('label'=>'Listado de Preguntas', 'url'=>array('admin')),
	array('label'=>'Nueva Pregunta', 'url'=>array('create')),	
);
?>

<h1>Actualizar Pregunta <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>