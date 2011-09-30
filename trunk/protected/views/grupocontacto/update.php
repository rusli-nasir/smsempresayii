<?php
if(!isset($this->breadcrumbs))

$this->breadcrumbs=array(
	'Grupocontactos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	Yii::t('app', 'Update'),
);

if(!isset($this->menu))
$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' Grupocontacto', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' Grupocontacto', 'url'=>array('create')),
	array('label'=>Yii::t('app', 'View') . ' Grupocontacto', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app', 'Manage') . ' Grupocontacto', 'url'=>array('admin')),
);
?>

<h1> <?php echo Yii::t('app', 'Update');?> Grupocontacto #<?php echo $model->id; ?> </h1>
<?php
$this->renderPartial('_form', array(
			'model'=>$model));
?>
