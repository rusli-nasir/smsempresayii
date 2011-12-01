<?php
$this->breadcrumbs=array(
	'Roles'=>array('admin'),
	Yii::t('App', 'Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('App', 'List').' Rol', 'url'=>array('admin')),
	array('label'=>Yii::t('App', 'Create').' Rol', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').slideToggle();
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

<h1><?php  echo Yii::t('App', 'Manage');?> Roles</h1>

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
            array(
              'class'   =>'CCheckBoxColumn',
            ),
		array(
            'name'=>'id',
            'value'=>$model->id,
            'htmlOptions'=>array('style'=>'width:50px'),
        ),
		'rol',
		'descripcion',
		array(
                    'name' => 'cmodulos',
                    'type' => 'raw',
                    'htmlOptions' => array('style' => 'width:250px;white-space: normal;'),
                ),
		/*'actions',*/
		array(
            'name'=>'activo',
            'value'=>'$data->activo?Yii::t("App","Yes"):Yii::t("App","No")',
            'filter'=>array('0'=>Yii::t("App","No"),'1'=>Yii::t("App","Yes")),
        ),
		array(
			'class'=>'CButtonColumn',
                        'template' => '{update} {delete}',
		),
	),
)); ?>
