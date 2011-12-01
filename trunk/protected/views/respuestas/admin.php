<?php
if(isset($_GET['id_pregunta'])){
$_SESSION["pregunta"]=$_GET['id_pregunta'];
}
$this->breadcrumbs=array(
	'Respuestas'=>array('admin'),
	Yii::t('App', 'Manage'),
);

$this->menu=array(
	array('label'=>'Listado de Respuestas', 'url'=>array('admin')),
	array('label'=>'Nueva Respuesta', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('respuestas-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Respuestas de la pregunta:</h1>
<br />
<h2>
<?php 
		$condicion="id=".$_SESSION["pregunta"];
		$pregunta=Preguntas::model()->find($condicion, 'pregunta'); 
		echo $pregunta->pregunta;
		?>	
        <span style="font-size:12px">(<?php echo CHtml::link("Regresar", "../preguntas",array("class"=>"openNewWindow")); ?>)</span>
</h2>


<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'respuestas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(		
		'respuesta',		
		array ('name'=>'sig_preg','value'=>'$data->idSPregunta->pregunta','type'=>'text'),				
		array(
			'class'=>'CButtonColumn','template' => '{update} {delete}',
		),
	),
)); ?>
