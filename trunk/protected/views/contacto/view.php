<?php
$this->breadcrumbs=array(
	'Contactos'=>array('admin'),
	$model->contactoid,
);

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' Contacto', 'url'=>array('index')),
	array('label'=>Yii::t('App', 'Create').' Contacto', 'url'=>array('create')),
	array('label'=>Yii::t('App', 'Update').' Contacto', 'url'=>array('update', 'id'=>$model->contactoid)),
	array('label'=>Yii::t('App', 'Delete').' Contacto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->contactoid),'confirm'=>Yii::t('App', 'Are you sure to delete this item?'))),
	array('label'=>Yii::t('App', 'Manage').' Contacto', 'url'=>array('admin')),
);
?>

<h1><?php  echo Yii::t('App', 'View');?> Contacto #<?php echo $model->contactoid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'contactoid',
		'nombres',
		'telefono',
		'fechaNacimiento',
		'createtime',
		'grupoInicial',
		array(
            'name'=>'activo',
            'value'=>$model->activo?Yii::t("App","Yes"):Yii::t("App","No"),
        ),
	),
)); ?>
