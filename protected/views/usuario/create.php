<?php
if(!isset($this->breadcrumbs))
$this->breadcrumbs=array(
	'Usuarios'=>array(Yii::t('app', 'index')),
	Yii::t('app', 'Create'),
);

if(!isset($this->menu))
$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' Usuario', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Manage') . ' Usuario', 'url'=>array('admin')),
);
?>

<h1> Create Usuario </h1>
<?php
$this->renderPartial('_form', array(
			'model' => $model,
			'buttons' => 'create'));

?>

