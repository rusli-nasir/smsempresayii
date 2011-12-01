<?php
$this->breadcrumbs=array(
	'Infosms'=>array('admin'),
	Yii::t('App', 'Manage'),
);

$this->menu=array(
	array('label'=>'Listado de Keywords', 'url'=>array('index')),
	array('label'=>'Nuevo Keyword', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('infosms-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Infosms</h1>


<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'infosms-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'keyword',
		'descripcion',
		'fecha_creacion',
		'mensaje1',
		'mensaje2',
		/*
		'id_usuario',
		*/
		array(
			'class'=>'CButtonColumn','template' => '{update} {delete}',
		),
	),
)); ?>
