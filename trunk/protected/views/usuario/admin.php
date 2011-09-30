<?php
if(!isset($this->breadcrumbs))

$this->breadcrumbs=array(
	'Usuarios'=>array(Yii::t('app', 'index')),
	Yii::t('app', 'Manage'),
);

if(!isset($this->menu) || $this->menu === array())
$this->menu=array(
		array('label'=>Yii::t('app', 'List') . ' Usuario',
			'url'=>array('index')),
		array('label'=>Yii::t('app', 'Create') . ' Usuario',
		'url'=>array('create')),
	);

		Yii::app()->clientScript->registerScript('search', "
			$('.search-button').click(function(){
				$('.search-form').toggle();
				return false;
				});
			$('.search-form form').submit(function(){
				$.fn.yiiGridView.update('usuario-grid', {
data: $(this).serialize()
});
				return false;
				});
			");
		?>

<h1> <?php echo Yii::t('app', 'Manage'); ?> Usuarios</h1>

<?php
echo "<ul>";
foreach ($model->relations() AS $key => $relation)
{
	echo  "<li>".
		substr(str_replace("Relation","",$relation[0]),1)." ".
		CHtml::link(Yii::t("app",$relation[1]), array($this->resolveRelationController($relation)."/admin"))." (".$relation[2].")".
		" </li>";
}
echo "</ul>";
?>
<?php echo CHtml::link(Yii::t('app', 'Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>

<?php
$locale = CLocale::getInstance(Yii::app()->language);

 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usuario-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'username',
		'password',
		'apellido',
		'nombre',
		array(
					'name'=>'rolid',
					'value'=>'CHtml::value($data,\'rol.rol\')',
							'filter'=>CHtml::listData(Rol::model()->findAll(), 'id', 'rol'),
							),
		/*
		array(
					'name'=>'nivelid',
					'value'=>'CHtml::value($data,\'nivel.nombre\')',
							'filter'=>CHtml::listData(Nivel::model()->findAll(), 'id', 'nombre'),
							),
		array(
					'name'=>'activo',
					'value'=>'$data->activo?Yii::t(\'app\',\'Yes\'):Yii::t(\'app\', \'No\')',
							'filter'=>array('0'=>Yii::t('app','No'),'1'=>Yii::t('app','Yes')),
							),
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
