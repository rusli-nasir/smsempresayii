<?php
$this->breadcrumbs=array(
	'Infosms'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	Yii::t('App', 'Update'),
);

$this->menu=array(
	array('label'=>'Listado de Keywords', 'url'=>array('admin')),
	array('label'=>'Nuevo keyword', 'url'=>array('create')),
	array('label'=>'Ver Infosms', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Actualizar Keyword Infosms <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>