<?php
$this->breadcrumbs=array(
	'Envios'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' Envio', 'url'=>array('index')),
	array('label'=>Yii::t('App', 'Create').' Envio', 'url'=>array('create')),
	array('label'=>Yii::t('App', 'Update').' Envio', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('App', 'Delete').' Envio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('App', 'Are you sure to delete this item?'))),
	array('label'=>Yii::t('App', 'Manage').' Envio', 'url'=>array('admin')),
);
?>

<h1><?php  echo Yii::t('App', 'View');?> Envio #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
            'name'=>'id',
            'value'=>$model->id,
            'htmlOptions'=>array('style'=>'width:50px'),
        ),
		'asunto',
		'tipoenvio',
		array(
            'name'=>'fechaInicio',
            'value'=>'date("d.m.Y",strtotime($data->fechaInicio))',
        ),
		array(
            'name'=>'fechaFin',
            'value'=>'date("d.m.Y",strtotime($data->fechaFin))',
        ),
		array(
            'name'=>'activo',
            'value'=>$model->activo?Yii::t("App","Yes"):Yii::t("App","No"),
        ),
	),
)); ?>
