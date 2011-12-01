<?php
$this->breadcrumbs=array(
	'Encuestas'=>array('Admin'),
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
	$.fn.yiiGridView.update('encuesta-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Encuestas</h1>



<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'encuesta-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(		
		'keyword',
		'descripcion',
		'fecha_creacion',
		//'id_usuario',
		array(
                        'class'=>'CDataColumn',
                        'type'=>'raw',
                        'header'=>'Preguntas',
                        'value'=>'CHtml::link("Detalle", "../preguntas?id_encuesta=".$data["id"],array("class"=>"openNewWindow"))',
                        
                        
                ),		
		array(
			'class'=>'CButtonColumn','template' => '{update} {delete}',
		),
		
	),
)); ?>
