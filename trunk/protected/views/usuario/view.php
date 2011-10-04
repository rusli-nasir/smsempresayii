<?php
if(!isset($this->breadcrumbs))

$this->breadcrumbs=array(
'Usuarios'=>array('index'),
	$model->username,
	);

if(!isset($this->menu) || $this->menu === array())
$this->menu=array(
		array('label'=>Yii::t('app', 'List') . ' Usuario', 'url'=>array('index')),
		array('label'=>Yii::t('app', 'Create') . ' Usuario', 'url'=>array('create')),
		array('label'=>Yii::t('app', 'Update') . ' Usuario', 'url'=>array('update', 'id'=>$model->id)),
		array('label'=>Yii::t('app', 'Delete') . ' Usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
		array('label'=>Yii::t('app', 'Manage') . ' Usuario', 'url'=>array('admin')),
		);
?>

<h1><?php echo Yii::t('app', 'View');?> Usuario #<?php echo $model->id; ?></h1>

<?php
$locale = CLocale::getInstance(Yii::app()->language);

 $this->widget('zii.widgets.CDetailView', array(
'data'=>$model,
	'attributes'=>array(
					'id',
		'username',
		'password',
		'apellido',
		'nombre',
		array(
			'name'=>'rolid',
			'value'=>($model->rol !== null)?CHtml::link($model->rol->rol, array('rol/view','id'=>$model->rol->id)):'n/a',
			'type'=>'html',
		),
		array(
			'name'=>'nivelid',
			'value'=>($model->nivel !== null)?CHtml::link($model->nivel->nombre, array('nivel/view','id'=>$model->nivel->id)):'n/a',
			'type'=>'html',
		),
		'activo',
),
	)); ?>


	<h2><?php echo CHtml::link(Yii::t('app','{relation}',array('{relation}'=>'Envioses')), array('envios/admin'));?></h2>
<ul><?php if (is_array($model->envioses)) foreach($model->envioses as $foreignobj) { 

					echo '<li>';
					echo CHtml::link(
						$foreignobj->conversationid?$foreignobj->conversationid:$foreignobj->id,
						array('envios/view', 'id' => $foreignobj->id));

					}; ?></ul><p><?php echo CHtml::link(
				Yii::t('app','Create'),
				array('envios/create', 'Envios' => array('usuarioid'=>$model->id))
				);  ?></p>