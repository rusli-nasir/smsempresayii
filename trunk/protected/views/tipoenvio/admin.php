<?php
$this->breadcrumbs=array(
	'Tipoenvios'=>array('admin'),
	Yii::t('App', 'Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' Tipoenvio', 'url'=>array('admin')),
	array('label'=>Yii::t('App', 'Create').' Tipoenvio', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').slideToggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tipoenvio-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php  echo Yii::t('App', 'Manage');?> Tipoenvios</h1>

<?php echo CHtml::link(Yii::t('App','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tipoenvio-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
            array(
              'class'   =>'CCheckBoxColumn',
            ),
		array(
            'name'=>'tipoid',
            'value'=>$model->tipoid,
            'htmlOptions'=>array('style'=>'width:50px'),
        ),
		'nombre',
		array(
			'class'=>'CButtonColumn',
                        'template' => '{update} {delete}',
		),
	),
)); ?>
