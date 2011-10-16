<?php
$this->breadcrumbs=array(
	'Rols'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' Rol', 'url'=>array('index')),
	array('label'=>Yii::t('App', 'Create').' Rol', 'url'=>array('create')),
	array('label'=>Yii::t('App', 'Update').' Rol', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('App', 'Delete').' Rol', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('App', 'Are you sure to delete this item?'))),
	array('label'=>Yii::t('App', 'Manage').' Rol', 'url'=>array('admin')),
);
?>

<h1><?php  echo Yii::t('App', 'View');?> Rol #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'rol',
		'descripcion',
		array(
            'name'=>'activo',
            'value'=>$model->activo?Yii::t("App","Yes"):Yii::t("App","No"),
        ),
	),
)); ?>
