<?php
$this->breadcrumbs=array(
	'Tipoenvios'=>array('admin'),
	$model->nombre,
);

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' Tipoenvio', 'url'=>array('index')),
	array('label'=>Yii::t('App', 'Create').' Tipoenvio', 'url'=>array('create')),
	array('label'=>Yii::t('App', 'Update').' Tipoenvio', 'url'=>array('update', 'id'=>$model->tipoid)),
	array('label'=>Yii::t('App', 'Delete').' Tipoenvio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tipoid),'confirm'=>Yii::t('App', 'Are you sure to delete this item?'))),
	array('label'=>Yii::t('App', 'Manage').' Tipoenvio', 'url'=>array('admin')),
);
?>

<h1><?php  echo Yii::t('App', 'View');?> Tipoenvio #<?php echo $model->tipoid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
            'name'=>'tipoid',
            'value'=>$model->tipoid,
            'htmlOptions'=>array('style'=>'width:50px'),
        ),
		'nombre',
	),
)); ?>
