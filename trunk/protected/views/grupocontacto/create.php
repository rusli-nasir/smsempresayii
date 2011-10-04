<?php
$this->breadcrumbs=array(
	'Grupos'=>array(Yii::t('app', 'admin')),
	Yii::t('App', 'Assign').' Contactos',
);

$this->menu=array(
	array('label' => Yii::t('App', 'List') . ' Grupo', 'url' => array('/grupo/index')),
	array('label'=>Yii::t('App', 'Manage') . ' Grupo', 'url'=>array('/grupo/admin')),
);
?>

<h1> <?php Yii::t('App', 'Assign'); ?> Contactos</h1>
<?php
$this->renderPartial('_form', array(
			'model' => $model,
			'buttons' => 'create'));

?>

