<?php
if(!isset($this->breadcrumbs))

$this->breadcrumbs=array(
'Grupocontactos'=>array('index'),
	$model->id,
	);

if(!isset($this->menu) || $this->menu === array())
$this->menu=array(
		array('label'=>Yii::t('app', 'List') . ' Grupocontacto', 'url'=>array('index')),
		array('label'=>Yii::t('app', 'Create') . ' Grupocontacto', 'url'=>array('create')),
		array('label'=>Yii::t('app', 'Update') . ' Grupocontacto', 'url'=>array('update', 'id'=>$model->id)),
		array('label'=>Yii::t('app', 'Delete') . ' Grupocontacto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
		array('label'=>Yii::t('app', 'Manage') . ' Grupocontacto', 'url'=>array('admin')),
		);
?>

<h1><?php echo Yii::t('app', 'View');?> Grupocontacto #<?php echo $model->id; ?></h1>

<?php
$locale = CLocale::getInstance(Yii::app()->language);

 $this->widget('zii.widgets.CDetailView', array(
'data'=>$model,
	'attributes'=>array(
					'id',
		array(
			'name'=>'contactoid',
			'value'=>($model->contacto !== null)?CHtml::link($model->contacto->nombres, array('contacto/view','id'=>$model->contacto->id)):'n/a',
			'type'=>'html',
		),
		array(
			'name'=>'grupoid',
			'value'=>($model->grupo !== null)?CHtml::link($model->grupo->nombre, array('grupo/view','id'=>$model->grupo->id)):'n/a',
			'type'=>'html',
		),
),
	)); ?>


	