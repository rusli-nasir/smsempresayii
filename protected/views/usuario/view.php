<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('admin'),
	$model->nombre,
);

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' Usuario', 'url'=>array('index')),
	array('label'=>Yii::t('App', 'Create').' Usuario', 'url'=>array('create')),
	array('label'=>Yii::t('App', 'Update').' Usuario', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('App', 'Delete').' Usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('App', 'Are you sure to delete this item?'))),
	array('label'=>Yii::t('App', 'Manage').' Usuario', 'url'=>array('admin')),
);
?>

<h1><?php  echo Yii::t('App', 'View');?> Usuario #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
            'name'=>'id',
            'value'=>$model->id,
            'htmlOptions'=>array('style'=>'width:50px'),
        ),
		'username',
		'password',
		'nombre',
		array(
            'name'=>'apellido',
            'value'=>$model->apellido,
            'htmlOptions'=>array('style'=>'width:50px'),
        ),
		'email',
		array(
            'name'=>'rolid',
            'value'=>CHtml::value($model,'rol.rol'),
        ),
		array(
            'name'=>'nivelid',
            'value'=>CHtml::value($model,'nivel.nombre'),
        ),
		array(
            'name'=>'activo',
            'value'=>$model->activo?Yii::t("App","Yes"):Yii::t("App","No"),
        ),
		array(
            'name'=>'dependid',
            'value'=>$model->dependid,
            'htmlOptions'=>array('style'=>'width:50px'),
        ),
	),
)); ?>
