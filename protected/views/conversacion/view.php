<?php
$this->breadcrumbs=array(
	'Conversaciones'=>array('admin'),
	$model->titulo,
);

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' Conversacion', 'url'=>array('index')),
	array('label'=>Yii::t('App', 'Create').' Conversacion', 'url'=>array('create')),
	array('label'=>Yii::t('App', 'Update').' Conversacion', 'url'=>array('update', 'id'=>$model->conversacionid)),
	array('label'=>Yii::t('App', 'Delete').' Conversacion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->conversacionid),'confirm'=>Yii::t('App', 'Are you sure to delete this item?'))),
	array('label'=>Yii::t('App', 'Manage').' Conversacion', 'url'=>array('admin')),
);
?>

<h1><?php  echo Yii::t('App', 'View');?> Conversacion #<?php echo $model->conversacionid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
            'name'=>'conversacionid',
            'value'=>$model->conversacionid,
            'htmlOptions'=>array('style'=>'width:50px'),
        ),
		'titulo',
		'descripcion',
	),
)); ?>
