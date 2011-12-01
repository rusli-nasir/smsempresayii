<?php
$this->breadcrumbs = array(
    'Usuarios' => array('admin'),
    Yii::t('App', 'Manage'),
);

$this->menu = array(
    array('label' => Yii::t('App', 'List') . ' Usuario', 'url' => array('admin')),
    array('label' => Yii::t('App', 'Create') . ' Usuario', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').slideToggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('usuario-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('App', 'Manage'); ?> Usuarios</h1>

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
    'id' => 'usuario-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'class' => 'CCheckBoxColumn',
        ),
        array(
            'name' => 'id',
            'value' => $data->id,
            'htmlOptions' => array('style' => 'width:50px'),
        ),
        array(
            'name' => 'nombre',
            'value' => $data->nombre,
            'htmlOptions' => array('style' => 'width:90px'),
        ),
        array(
            'name' => 'apellido',
            'value' => $data->apellido,
            'htmlOptions' => array('style' => 'width:100px'),
        ),
        array(
            'name' => 'username',
            'value' => '$data->username',
            'htmlOptions' => array('style' => 'width:80px;text-align:center;'),
        ),
        'email',
        array(
          'name'=>'rolid',
          'value'=>'$data->rol->rol',
          'filter'=>CHtml::listData(Rol::model()->findAll(), 'id', 'rol'),
          ),




          /*
           'password',

          array(
          'name'=>'nivelid',
          'value'=>'$data->nivel->nombre',
          'filter'=>CHtml::listData(Nivel::model()->findAll(), 'id', 'nombre'),
          ),*/
          array(
              'name'=>'activo',
              'value'=>'$data->activo?Yii::t("App","Yes"):Yii::t("App","No")',
              'filter'=>array('0'=>Yii::t("App","No"),'1'=>Yii::t("App","Yes")),
              'htmlOptions' => array('style' => 'text-align:center;'),
          ),/*
          array(
          'name'=>'dependid',
          'value'=>$model->dependid,
          'htmlOptions'=>array('style'=>'width:50px'),
          ),
         */
        array(
            'class' => 'CButtonColumn',
            'template' => '{update} {delete}',
        ),
    ),
));
?>
