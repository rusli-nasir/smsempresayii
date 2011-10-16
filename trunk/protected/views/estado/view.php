<?php
$this->breadcrumbs=array(
	'Estados'=>array('index'),
	$model->nombre,
);

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' Estado', 'url'=>array('index')),
	array('label'=>Yii::t('App', 'Create').' Estado', 'url'=>array('create')),
	array('label'=>Yii::t('App', 'Update').' Estado', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('App', 'Delete').' Estado', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('App', 'Are you sure to delete this item?'))),
	array('label'=>Yii::t('App', 'Manage').' Estado', 'url'=>array('admin')),
);
?>

<h1><?php  echo Yii::t('App', 'View');?> Estado #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'mensaje',
		array(
            'name'=>'activo',
            'value'=>$model->activo?Yii::t("App","Yes"):Yii::t("App","No"),
        ),
	),
)); ?>
