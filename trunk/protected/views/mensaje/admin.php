<?php
$this->breadcrumbs=array(
	'Mensajes'=>array('admin'),
	Yii::t('App', 'Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' Mensaje', 'url'=>array('admin')),
	array('label'=>Yii::t('App', 'Create').' Mensaje', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').slideToggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('mensaje-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php  echo Yii::t('App', 'Manage');?> Mensajes</h1>

<?php echo CHtml::link(Yii::t('App','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'mensaje-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
            array(
              'class'   =>'CCheckBoxColumn',
            ),
		array(
            'name'=>'id',
            'value'=>$model->id,
            'htmlOptions'=>array('style'=>'width:50px'),
        ),
		array(
            'name'=>'operadoraid',
            'value'=>'$data->operadora->nombre',
            'filter'=>CHtml::listData(Operadora::model()->findAll(), 'id', 'nombre'),
        ),
		array(
            'name'=>'usuarioid',
            'value'=>'$data->usuario->username',
            'filter'=>CHtml::listData(Usuario::model()->findAll(), 'id', 'username'),
        ),
		array(
            'name'=>'estadoid',
            'value'=>'$data->estado->nombre',
            'filter'=>CHtml::listData(Estado::model()->findAll(), 'id', 'nombre'),
        ),
		array(
            'name'=>'envioid',
            'value'=>'$data->envio->grupos',
            'filter'=>CHtml::listData(Envio::model()->findAll(), 'id', 'grupos'),
        ),
		'telefono',
		/*
		array(
            'name'=>'createtime',
            'value'=>'date("d.m.Y h:i a",strtotime($data->createtime))',
        ),
		'mensaje',
		array(
            'name'=>'grupoid',
            'value'=>$model->grupoid,
            'htmlOptions'=>array('style'=>'width:50px'),
        ),
		*/
		array(
			'class'=>'CButtonColumn',
                        'template' => '{update} {delete}',
		),
	),
)); ?>
