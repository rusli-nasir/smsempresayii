<?php
$this->breadcrumbs=array(
	'Nivels'=>array('admin'),
	$model->nombre,
);

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' Nivel', 'url'=>array('index')),
	array('label'=>Yii::t('App', 'Create').' Nivel', 'url'=>array('create')),
	array('label'=>Yii::t('App', 'Update').' Nivel', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('App', 'Delete').' Nivel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('App', 'Are you sure to delete this item?'))),
	array('label'=>Yii::t('App', 'Manage').' Nivel', 'url'=>array('admin')),
);
?>

<h1><?php  echo Yii::t('App', 'View');?> Nivel #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'descripcion',
		array(
            'name'=>'activo',
            'value'=>$model->activo?Yii::t("App","Yes"):Yii::t("App","No"),
        ),
	),
)); ?>
