<?php
if(isset($_GET['id_encuesta'])){
$_SESSION["encuesta"]=$_GET['id_encuesta'];
}

$this->breadcrumbs=array(
	'Preguntas'=>array('admin'),
	Yii::t('App', 'Manage'),
);

$this->menu=array(
	array('label'=>'Listado de Preguntas', 'url'=>array('admin')),
	array('label'=>'Nueva Pregunta', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('preguntas-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Preguntas para el keyword:</h1>
<br />
<h2>
<?php 
		$condicion="id=".$_SESSION["encuesta"];
		$encuesta=Encuesta::model()->find($condicion, 'keyword'); 		
		echo $encuesta->keyword;
		?>	
        <span style="font-size:12px">(<?php echo CHtml::link("Regresar", "../encuesta",array("class"=>"openNewWindow")); ?>)</span>
</h2>
<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'preguntas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(		
		'pregunta',	
		array(
                        'class'=>'CDataColumn',
                        'type'=>'raw',
                        'header'=>'Preguntas',
                        'value'=>'CHtml::link("Detalle", "../respuestas?id_pregunta=".$data["id"],array("class"=>"openNewWindow"))',
                        
                        
                ),	
		array(
			'class'=>'CButtonColumn','template' => '{update} {delete}',
		),
		
	),
)); ?>
