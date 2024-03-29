<?php
$this->breadcrumbs=array(
	'Variables'=>array('admin'),
	$model->nombre,
);

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' Variable', 'url'=>array('index')),
	array('label'=>Yii::t('App', 'Create').' Variable', 'url'=>array('create')),
	array('label'=>Yii::t('App', 'Update').' Variable', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('App', 'Delete').' Variable', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('App', 'Are you sure to delete this item?'))),
	array('label'=>Yii::t('App', 'Manage').' Variable', 'url'=>array('admin')),
);
?>

<h1><?php  echo Yii::t('App', 'View');?> Variable #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
            'name'=>'id',
            'value'=>$model->id,
            'htmlOptions'=>array('style'=>'width:50px'),
        ),
		'nombre',
		'valor',
		array(
            'name'=>'createtime',
            'value'=>'date("d.m.Y h:i a",strtotime($data->createtime))',
        ),
		array(
            'name'=>'activo',
            'value'=>$model->activo?Yii::t("App","Yes"):Yii::t("App","No"),
        ),
	),
)); ?>
