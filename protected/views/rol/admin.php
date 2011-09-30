<?php
$this->breadcrumbs=array(
	'Rols'=>array('index'),
	Yii::t('App', 'Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' Rol', 'url'=>array('index')),
	array('label'=>Yii::t('App', 'Create').' Rol', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('rol-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php  echo Yii::t('App', 'Manage');?> Rols</h1>

<p>
<?php  echo Yii::t('App', 'You may optionally enter a comparison operator');?> (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
<?php  echo Yii::t('App', 'or');?> <b>=</b>) <?php  echo Yii::t('App', 'at the beginning of each of your search values to specify how the comparison should be done');?>.
</p>

<?php echo CHtml::link(Yii::t('App','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'rol-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'rol',
		'descripcion',
		array(
            'name'=>'activo',
            'value'=>'$data->activo?Yii::t("App","Yes"):Yii::t("App","No")',
            'filter'=>array('0'=>Yii::t("App","No"),'1'=>Yii::t("App","Yes")),
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
