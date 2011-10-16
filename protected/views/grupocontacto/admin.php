<?php
if(!isset($this->breadcrumbs))

$this->breadcrumbs=array(
	'Grupocontactos'=>array(Yii::t('app', 'index')),
	Yii::t('app', 'Manage'),
);

if(!isset($this->menu) || $this->menu === array())
$this->menu=array(
		array('label'=>Yii::t('app', 'List') . ' Grupocontacto',
			'url'=>array('index')),
		array('label'=>Yii::t('app', 'Create') . ' Grupocontacto',
		'url'=>array('create')),
	);

		Yii::app()->clientScript->registerScript('search', "
			$('.search-button').click(function(){
				$('.search-form').toggle();
				return false;
				});
			$('.search-form form').submit(function(){
				$.fn.yiiGridView.update('grupocontacto-grid', {
data: $(this).serialize()
});
				return false;
				});
			");
		?>

<h1> <?php echo Yii::t('app', 'Manage'); ?> Grupocontactos</h1>

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
	'id'=>'grupocontacto-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
					'name'=>'contactoid',
					'value'=>'CHtml::value($data,\'contacto.recordTitle\')',
							'filter'=>CHtml::listData(Contacto::model()->findAll(), 'contactoid', 'recordTitle'),
							),
		array(
					'name'=>'grupoid',
					'value'=>'CHtml::value($data,\'grupo.nombre\')',
							'filter'=>CHtml::listData(Grupo::model()->findAll(), 'grupoid', 'nombre'),
							),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
