<?php
if(!isset($this->breadcrumbs))
$this->breadcrumbs=array(
	'Grupocontactos'=>array(Yii::t('app', 'index')),
	Yii::t('app', 'Create'),
);

if(!isset($this->menu))
$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' Grupocontacto', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Manage') . ' Grupocontacto', 'url'=>array('admin')),
);
?>

<h1> Create Grupocontacto </h1>
<?php
$this->renderPartial('_form', array(
			'model' => $model,
			'buttons' => 'create'));

?>

