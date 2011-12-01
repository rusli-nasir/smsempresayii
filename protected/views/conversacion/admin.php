<?php
$this->breadcrumbs = array(
    'Conversaciones' => array('admin'),
    Yii::t('App', 'Manage'),
);

$this->menu = array(
    array('label' => Yii::t('App', 'List') . ' Conversación', 'url' => array('admin')),
    array('label' => Yii::t('App', 'Create') . ' Conversación', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').slideToggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('conversacion-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('App', 'Manage'); ?> Conversaciones</h1>

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
    'id' => 'conversacion-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    /*'selectionChanged'=>'onSelected',*/
    'columns' => array(
        array(
            'class' => 'CCheckBoxColumn',
        ),
        array(
            'name' => 'conversacionid',
            'value' => $model->conversacionid,
            'htmlOptions' => array('style' => 'width:50px'),
        ),
        'titulo',
        'descripcion',
         /*array(
            'class'=>'CDataColumn',
            'type' => 'raw',
            'header'=>' ',
            'value'=>'CHtml::link("Agregar Envio", "/envio/create?type=3&cid=".$data["conversacionid"],array("class"=>"addsms"))',
        ),
       CHtml::link("Agregar", "/envio/create?type=3&cid=".$data["conversacionid"],array("class"=>"addsms")),
          array(
            'class'=>'CDataColumn',
            'type' => 'raw',
            'header'=>'Envios SMS',
            'value' => 'CHtml::ajaxLink("Detalle", "/envio/admin?type=3&Envio[conversationid]=".$data["conversacionid"],array("replace"=>"#details"),array("class"=>"viewsms"))',
            'htmlOptions' => array('style' => 'width:100px'),
        ),*/
        array(
            'htmlOptions'   => array('style' => 'width:150px'),
            'class'         => 'CButtonColumn',
            'header'        => 'Envios SMS',
            'template' => '{addenvio} | {viewdetails}',
            'buttons' => array(
                'addenvio' => array(
                    'label' => 'Agregar Envio',
                    'url' => '"/envio/create?type=3&cid=".$data["conversacionid"]',
                    'options'=>array('class'=>'addsms')
                ),
                'viewdetails' => array(
                    'label' => 'Ver Envios',
                    'url' => '"#/envio/admin?click=details&Envio[conversationid]=".$data["conversacionid"]',
                    'options'=>array('class'=>'viewsms'),
                ),
            ),
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{update}',
        ),
    ),
));
?>
<div class="loading" style="display: none;">Cargando detalle...</div>
<div id="details"></div>
<?php
$cs = Yii::app()->getClientScript();
$cs->registerScript(
        "gridselected", "
        /*function onSelected(a) {
            var nrow=$.fn.yiiGridView.getSelection(a);

        }*/
        $('.viewsms').click(function(){
            //jQuery('#details').empty();
            var href=$(this).attr('href').substring(1);
            jQuery.ajax({
                url:href,
                beforeSend: function(){
                    $('.loading').fadeIn('fast');
                },
                success:function(html){
                    jQuery('#details').html(html);
                },
                complete:function(){
                    $('.loading').fadeOut('fast');
                }
            });
            return false;
        });
", CClientScript::POS_READY);
?>
