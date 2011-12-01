<?php
$this->breadcrumbs = array(
    'Contactos' => array('admin'),
    Yii::t('App', 'Manage'),
);

$this->menu = array(
    array('label' => Yii::t('App', 'List') . ' Contacto', 'url' => array('admin')),
    array('label' => Yii::t('App', 'Create') . ' Contacto', 'url' => array('create')),
    array('label' => Yii::t('App', 'Export') . ' a Excel', 'url' => array('exportxls')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').slideToggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('contacto-grid', {
		data: $(this).serialize(),
	});
        $('.cgrupo').corner('3px');
	return false;
});
");
?>

<h1><?php echo Yii::t('App', 'Manage'); ?> Contactos</h1>

<?php echo CHtml::link(Yii::t('App', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'contacto-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'afterAjaxUpdate'=> 'function(){$(\'.cgrupo\').corner(\'3px\');}',
    'columns' => array(
        array(
            'class' => 'CCheckBoxColumn',
        ),
        array(
            'name' => 'contactoid',
            'htmlOptions' => array('style' => 'width:50px'),
        ),
        'nombres',
        array(
            'name' => 'telefono',
            'htmlOptions' => array('style' => 'width:80px'),
        ),
        array(
            'name' => 'createtime',
            'value' => 'date("d.m.Y h:i a",strtotime($data->createtime))',
        ),
        array(
            'name' => 'grupos',
            'type' => 'raw',
            'filter'=>CHtml::listData(Grupo::model()->findAll(), 'grupoid', 'nombre'),
            'htmlOptions' => array('style' => 'width:150px;white-space: normal;'),
        ),

          array(
          'name'=>'activo',
          'value'=>'$data->activo?Yii::t("App","Yes"):Yii::t("App","No")',
          'filter'=>array('0'=>Yii::t("App","No"),'1'=>Yii::t("App","Yes")),
          ),

        array(
            'class' => 'CButtonColumn',
            'template' => '{update} {delete}',
        ),
    ),
));
$cs = Yii::app()->getClientScript();
//$cs->registerCssFile('http://harvesthq.github.com/chosen/chosen/chosen.css');
$cs->registerScriptFile('/js/jquery.corner.js?v2.11', CClientScript::POS_END);
$cs->registerScript(
        "checkGrupo", "$('.cgrupo').corner('3px');", CClientScript::POS_END);
?>
